<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
