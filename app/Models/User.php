<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastName',
        'deleted',
        'is_admin',
        'rank_id',
        'points',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function updateUserRank(): void
    {
        $newRank = Rank::where('min_points', '<=', $this->points ?? 0)
            ->orderByDesc('min_points')
            ->first();

        if ($newRank && $this->rank_id !== $newRank->id) {
            $this->rank_id = $newRank->id;
            $this->save();
        }
    }

    public function getAvatarUrlAttribute(): string
    {
            return $this->image_path
                ? asset('storage/'.$this->image_path)
                : asset('images/defaults/user.png');
    }
    
    public function likedComments()
    {
        return $this->belongsToMany(\App\Models\Comment::class, 'comment_likes')
                    ->withTimestamps();
    }

    public function commentReportsMade()
    {
        return $this->hasMany(\App\Models\CommentReport::class, 'reporter_id');
    }

    public function commentReportsHandled()
    {
        return $this->hasMany(\App\Models\CommentReport::class, 'handled_by');
    }
}
