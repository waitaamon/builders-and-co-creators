<?php

namespace App\Models\Directory\Profession;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    /**
     * Get all of the bodies for the membership.
     */
    public function bodies()
    {
        return $this->morphToMany('App\Models\Directory\Profession\Body', 'bodyable');
    }
}
