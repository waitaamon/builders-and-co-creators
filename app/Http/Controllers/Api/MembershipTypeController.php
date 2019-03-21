<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\MembershipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipTypeController extends Controller
{
    /**
     * @var MembershipRepository
     */
    protected $memberships;

    /**
     * MembershipTypeController constructor.
     * @param MembershipRepository $memberships
     */
    public function __construct(MembershipRepository $memberships)
    {
        $this->memberships = $memberships;
    }

}
