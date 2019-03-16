<?php

namespace App\Models\Directory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['short_code', 'name', 'code'];

    public function counties()
    {
        return $this->hasMany(County::class);
    }

    public function sub_counties()
    {
        return $this->hasManyThrough(SubCounty::class, County::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Location::class);
    }
}
