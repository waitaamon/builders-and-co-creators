<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:57 PM
 */

namespace App\Repositories\Contracts;


interface UserRepository
{
    public function sync(int $userId, $method, array  $properties);

    public function createLocation(int $userId, array  $properties);
}