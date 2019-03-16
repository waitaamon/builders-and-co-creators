<?php

namespace App\Models;

use App\Models\Directory\Location;
use App\Models\Directory\Profession\{ArchitectBody,
    ContractorType,
    EngineerBody,
    EngineerType,
    GeneralDetail,
    Profession,
    ProfessionalBody,
    SupplierItem,
    WorkerType};
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

    public function professions()
    {
        return $this->belongsToMany(Profession::class, 'profession_user');
    }

    public function contractor_types()
    {
        return $this->belongsToMany(ContractorType::class, 'contractor_user');
    }

    public function worker_types()
    {
        return $this->belongsToMany(WorkerType::class, 'user_worker_type');
    }

    public function professional_bodies()
    {
        return $this->belongsToMany(ProfessionalBody::class, 'professional_body_user');
    }

    public function supplier_items()
    {
        return $this->belongsToMany(SupplierItem::class, 'supplier_item_user');
    }

    public function engineer_types()
    {
        return $this->belongsToMany(EngineerType::class, 'engineer_type_user');
    }

    public function engineer_bodies()
    {
        return $this->belongsToMany(EngineerBody::class, 'engineer_body_user');
    }

    public function architect_bodies()
    {
        return $this->belongsToMany(ArchitectBody::class, 'architect_body_user');
    }
}
