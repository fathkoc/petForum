<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Support\TextCensor;
use Illuminate\Support\Facades\Storage;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'user_id', 'title', 'content', 'deleted', 'phone', 'gender', 'city', 'district', 'genus', 'age', 'type', 'animal'];

     public function setTitleAttribute($value): void
    {
        $this->attributes['title'] =
            TextCensor::apply((string) $value, config('banned.censor', []));
    }

    public function setContentAttribute($value): void
    {
        $this->attributes['content'] =
            TextCensor::apply((string) $value, config('banned.censor', []));
    }

    public function getCoverUrlAttribute(): string
    {
        // İlişkili ilk resmi döndür, yoksa default
        $first = $this->images()->first();
        if ($first && $first->image_path) {
            return Storage::url($first->image_path);
        }
        // varsayılan public/images altında
        return asset('images/defaults/topic.png');
    }

    protected static function booted(): void
    {
        static::saving(function (Topic $topic) {
            $blocked = config('banned.block', []);
            if (
                TextCensor::hasBlocked($topic->title ?? '', $blocked) ||
                TextCensor::hasBlocked($topic->content ?? '', $blocked)
            ) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'content' => 'Uygunsuz içerik tespit edildi.',
                ]);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function comments()
    {
        return $this->hasMany(Comment::class)->where('deleted', 0);
    }

    public function images()
    {
        return $this->hasMany(TopicImage::class, 'topic_id')->where('deleted', 0);
    }

    public function likes(){ return $this->hasMany(TopicLike::class); }
    public function reports(){ return $this->hasMany(TopicReport::class); }

    public function isLikedBy($userId): bool {
        return $this->likes->contains('user_id', $userId);
    }       

}
