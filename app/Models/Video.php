<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{


    protected   $fillabel = ['title', 'content', 'urlPath'];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
