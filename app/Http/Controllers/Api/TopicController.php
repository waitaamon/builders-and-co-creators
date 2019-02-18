<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TopicResource;
use App\Repositories\Contracts\TopicRepository;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * @var TopicRepository
     */
    protected $topics;

    /**
     * TopicController constructor.
     * @param TopicRepository $topics
     */
    public function __construct(TopicRepository $topics)
    {
        $this->topics = $topics;
    }

    /**
     *json listing of all topics.
     */
    public function index()
    {
        $topics = $this->topics->all();

        return response()->json(
            TopicResource::collection($topics)
        , 200);
    }
}
