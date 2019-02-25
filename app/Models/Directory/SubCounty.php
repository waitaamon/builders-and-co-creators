<?php

namespace App\Models\Directory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    protected $fillable = ['county_id', 'name'];

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Location::class, 'sub_county_id', 'user_id');
    }
}
