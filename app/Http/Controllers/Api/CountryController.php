<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CountryResource;
use App\Repositories\Contracts\CountryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    protected $countries;

    /**
     * CountryController constructor.
     * @param CountryRepository $countries
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    public function index() {
        $countries = $this->countries->all();

        return response(CountryResource::collection($countries),200);
    }
}
