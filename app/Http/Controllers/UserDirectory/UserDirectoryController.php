<?php

namespace App\Http\Controllers\UserDirectory;

use App\Http\Requests\Directory\{LocationRequest, PersonalDetailsRequest, ProfessionRequest};
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDirectoryController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * UserDirectoryController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return view('register');
    }

    /**
     * Check if user exists
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function check_user_exists(Request $request) {
        $this->validate($request, [
            'phone' => 'required'
        ]);

        $user = $this->users->findWhereFirst('phone', $request->phone);

        if(!$user) {
            return response()->json([
                'message' => 'no-user'
            ], 200);
        }
        return response()->json( new UserResource($user),200);
    }

    /**
     * Store personal details
     * @param PersonalDetailsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function personal_details(PersonalDetailsRequest $request)
    {
        $user = $this->users->create($request->all());

        if(!$user) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create user, try again later'
                    ]
                ]
            ], 422);
        }
        return response()->json(new UserResource($user), 200);
    }

    /**
     * Store user location details
     * @param LocationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function location(LocationRequest $request) {

        $location = $this->users->createLocation($request->userId, [
            'country_id' => $request->country,
            'county_id' => $request->county,
            'sub_county_id' => $request->sub_county,
            'state' => $request->state
        ]);

        if(!$location) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create user location, try again later!'
                    ]
                ]
            ], 422);
        }
        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     *Store user profession details
     * @param ProfessionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profession(ProfessionRequest $request)
    {

    }

    /**
     *Store user profession bodies details
     */
    public function professional_bodies()
    {

    }
}
