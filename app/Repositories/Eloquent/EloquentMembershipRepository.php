<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Directory\Profession\Membership;
use App\Repositories\Contracts\MembershipRepository;
use App\Repositories\RepositoryAbstract;

class EloquentMembershipRepository extends RepositoryAbstract implements MembershipRepository
{
    public function entity() {

        return Membership::class;
    }
}