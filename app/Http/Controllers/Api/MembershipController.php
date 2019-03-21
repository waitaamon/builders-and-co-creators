<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MembershipResource;
use App\Repositories\Contracts\MembershipRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    /**
     * @var MembershipRepository
     */
    protected $memberships;

    /**
     * MembershipController constructor.
     * @param MembershipRepository $memberships
     */
    public function __construct(MembershipRepository $memberships) {

        $this->memberships = $memberships;
    }

    /**
     * Membership json object
     */
    public function index()
    {
        $memberships = $this->memberships->withCriteria(
            new EagerLoad(['bodies'])
        )->all();

        return response(MembershipResource::collection($memberships), 200);
    }

    /**
     * Get membership
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id) {

        $membership = $this->memberships->withCriteria( new EagerLoad(['membership_types', 'bodies']))->find($id);

        return response(new MembershipResource($membership),200);
    }
}
