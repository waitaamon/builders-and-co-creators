<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BodyResource;
use App\Repositories\Contracts\BodyRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodyController extends Controller
{
    /**
     * @var BodyRepository
     */
    protected $bodies;

    /**
     * BodyController constructor.
     * @param BodyRepository $bodies
     */
    public function __construct(BodyRepository $bodies)
    {
        $this->bodies = $bodies;
    }

    public function index()
    {
        $bodies = $this->bodies->withCriteria(
            new EagerLoad(['memberships'])
        )->all();

        return response(BodyResource::collection($bodies), 200);
    }
}
