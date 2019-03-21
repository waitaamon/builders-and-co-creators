<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Directory\Profession\Body;
use App\Repositories\Contracts\BodyRepository;
use App\Repositories\RepositoryAbstract;

class EloquentBodyRepository extends RepositoryAbstract implements BodyRepository
{
    public function entity() {

        return Body::class;
    }
}