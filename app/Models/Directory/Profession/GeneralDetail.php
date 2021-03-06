<?php

namespace App\Models\Directory\Profession;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GeneralDetail extends Model
{
    protected $fillable = ['user_id', 'about', 'company'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
