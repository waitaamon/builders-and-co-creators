<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'topic_post');
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'topic_video');
    }
}
