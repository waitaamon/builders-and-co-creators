<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CountryResource;
use App\Http\Controllers\Controller;
use App\Models\Directory\Country;
use App\Models\Directory\Profession\Membership;

class RegistrationDetail extends Controller
{
    public function index()
    {

        $countries = Country::all();

        $memberships = Membership::all();

        return response()->json([
            'countries' => CountryResource::collection($countries),
            'memberships' => $memberships
        ], 200);

    }
}
