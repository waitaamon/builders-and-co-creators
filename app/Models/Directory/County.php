<?php

namespace App\Models\Directory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['country_id', 'name', 'capital', 'code'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function sub_county()
    {
        return $this->hasMany(SubCounty::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Location::class);
    }
}
