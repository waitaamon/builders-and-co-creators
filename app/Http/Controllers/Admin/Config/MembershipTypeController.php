<?php

namespace App\Http\Controllers\Admin\Config;

use function App\Helpers\extract_data;
use App\Http\Requests\Directory\MembershipTypeRequest;
use App\Http\Resources\MembershipResource;
use App\Repositories\Contracts\MembershipRepository;
use App\Repositories\Contracts\MembershipTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipTypeController extends Controller
{
    /**
     * @var MembershipTypeRepository
     */
    protected $types;
    /**
     * @var MembershipRepository
     */
    protected $memberships;

    /**
     * MembershipTypeController constructor.
     * @param MembershipTypeRepository $types
     * @param MembershipRepository $memberships
     */
    public function __construct(MembershipTypeRepository $types, MembershipRepository $memberships)
    {
        $this->types = $types;
        $this->memberships = $memberships;
    }

    /**
     * Store a newly created membership type in storage.
     *
     * @param MembershipTypeRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(MembershipTypeRequest $request)
    {
        $membership = $this->memberships->find($request->membership);

        $type = $this->types->create([
            'membership_id' => $membership->id,
            'is_specialized' => $request->is_specialized,
            'is_engineer' => $request->is_engineer,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $this->types->sync($type->id, 'bodies', extract_data($request->bodies));

        return response(new MembershipResource($membership), 200);
    }

    /**
     * Update the specified membership type in storage.
     *
     * @param MembershipTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembershipTypeRequest $request, $id)
    {
        $membership = $this->memberships->find($request->membership);

        $type = $this->types->update($id, [
            'is_specialized' => $request->is_specialized,
            'is_engineer' => $request->is_engineer,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $this->types->sync($id, 'bodies', extract_data($request->bodies));

        return response(new MembershipResource($membership), 200);
    }

    /**
     * Remove the specified membership type from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = $this->types->find($id);

        $membership = $type->membership;

        if(!$type->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete membership type, try again later!'
                    ]
                ]
            ],422);
        }

        return response(new MembershipResource($membership),200);
    }
}
