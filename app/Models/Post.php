<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'image',
        'short_description',
        'instagram_link',
        'facebook_link',
        'twitter_link',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
