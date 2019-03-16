<?php

namespace App\Models\Directory\Profession;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GeneralDetail extends Model
{
    protected $fillable = ['user_id', 'about', 'supplier_description', 'engineer_description', 'architect_description', 'company'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
