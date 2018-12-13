<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;
use App\User;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{

    public function entity() {

        return User::class;
    }

    public function createAddress($userId, array $properties)
    {

        return $this->find($userId)->addresses()->create($properties);
    }

    public function deleteAddress($userId, $addressId)
    {

        return $this->find($userId)->addresses()->findOrFail($addressId)->delete();
    }
}