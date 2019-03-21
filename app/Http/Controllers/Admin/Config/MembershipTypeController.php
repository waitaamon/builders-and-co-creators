<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Resources\MembershipResource;
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
     * MembershipTypeController constructor.
     * @param MembershipTypeRepository $types
     */
    public function __construct(MembershipTypeRepository $types)
    {
        $this->types = $types;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
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
