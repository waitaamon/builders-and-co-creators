<?php

namespace App\Models\Directory\Profession;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    protected $fillable = ['title', 'description'];

    /**
     * Get all of the users that are assigned this body.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'body_user');
    }

    /**
     * Get all of the memberships that are assigned this body.
     */
    public function memberships()
    {
        return $this->morphedByMany('App\Models\Directory\Profession\Membership', 'bodyable');
    }

    /**
     * Get all of the membership types that are assigned this body.
     */
    public function membership_types()
    {
        return $this->morphedByMany('App\Models\Directory\Profession\MembershipType', 'bodyable');
    }
}
