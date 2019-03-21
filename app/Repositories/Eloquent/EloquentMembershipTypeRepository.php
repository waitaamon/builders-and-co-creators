<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Directory\Profession\MembershipType;
use App\Repositories\Contracts\MembershipTypeRepository;
use App\Repositories\RepositoryAbstract;

class EloquentMembershipTypeRepository extends RepositoryAbstract implements MembershipTypeRepository
{
    public function entity() {

        return MembershipType::class;
    }
}