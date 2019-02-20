<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class SliderImage extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['user_id', 'identifier', 'order', 'title', 'sub_title', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
