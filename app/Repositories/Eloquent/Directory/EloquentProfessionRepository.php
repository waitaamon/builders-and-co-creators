<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent\Directory;

use App\Models\Directory\Profession\Profession;
use App\Repositories\Contracts\UserDirectoryRepository;
use App\Repositories\RepositoryAbstract;

class EloquentProfessionRepository extends RepositoryAbstract implements UserDirectoryRepository
{

    public function entity() {

        return Profession::class;
    }
}