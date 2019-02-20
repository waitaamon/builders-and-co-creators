<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\VideoResource;
use App\Repositories\Contracts\VideoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * @var VideoRepository
     */
    protected $videos;

    /**
     * VideoController constructor.
     * @param VideoRepository $videos
     */
    public function __construct(VideoRepository $videos)
    {

        $this->videos = $videos;
    }

    public function index()
    {
        $videos = $this->videos->all();

        return response()->json(VideoResource::collection($videos), 200);
    }
}
