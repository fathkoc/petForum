<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = ['name', 'min_points'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
