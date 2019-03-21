<?php

namespace App\Http\Controllers\Admin\Config;

use function App\Helpers\extract_data;
use App\Http\Requests\Directory\MembershipRequest;
use App\Http\Resources\MembershipResource;
use App\Repositories\Contracts\MembershipRepository;
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
    public function __construct(MembershipRepository $memberships)
    {
        $this->memberships = $memberships;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.config.membership.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = $this->memberships->find($id);

        return view('admin.config.membership.edit', compact('membership'));
    }

    /**
     * Update the specified membership in storage.
     *
     * @param MembershipRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MembershipRequest $request, $id)
    {
        $membership = $this->memberships->find($id);

        if(!$membership) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not find membership, try again later!'
                    ]
                ]
            ],422);
        }

        $update = $this->memberships->update($id, [
            'title' => $request->title == $membership->title ? $membership->title : $request->title,
            'description' => $request->description == $membership->description ? $membership->description : $request->description,
        ]);


        $this->memberships->sync($membership->id, 'bodies', extract_data($request->bodies));

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = $this->memberships->find($id);

        if(!$membership->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete membership, try again later!'
                    ]
                ]
            ],422);
        }

        $memberships = $this->memberships->all();

        return response(MembershipResource::collection($memberships),200);
    }
}
