<?php

namespace App\Models\Directory\Profession;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EngineerBody extends Model
{
    protected $fillable = ['title', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'engineer_body_user');
    }
}