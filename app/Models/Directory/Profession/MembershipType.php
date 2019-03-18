<?php

namespace App\Models\Directory\Profession;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    protected $fillable = ['membership_id', 'is_engineer', 'is_specialized', 'title', 'description'];

    /**
     * Get all of the bodies for the membership.
     */
    public function bodies()
    {
        return $this->morphToMany('App\Models\Directory\Profession\Body', 'bodyable');
    }
}
