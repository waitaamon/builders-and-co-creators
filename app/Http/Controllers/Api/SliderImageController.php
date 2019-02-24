<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SliderImageResource;
use App\Repositories\Contracts\ImageSliderRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\OrderBy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderImageController extends Controller
{
    /**
     * @var ImageSliderRepository
     */
    protected $images;

    /**
     * SliderImageController constructor.
     * @param ImageSliderRepository $images
     */
    public function __construct(ImageSliderRepository $images)
    {
        $this->images = $images;
    }

    public function index()
    {
        $images = $this->images->withCriteria(new OrderBy())->all();

        return response()->json(SliderImageResource::collection($images),200);
    }

}
