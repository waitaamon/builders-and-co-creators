<?php

namespace App\Models;

use App\Models\Directory\Location;
use App\Models\Directory\Profession\{Body, GeneralDetail};
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'national_id', 'facebook_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function slider_images()
    {
        return $this->hasMany(SliderImage::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function profession_general_details()
    {
        return $this->hasOne(GeneralDetail::class, 'user_id');
    }

    /**
     * Get all of the bodies that are assigned this user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Body::class, 'body_user');
    }

}
