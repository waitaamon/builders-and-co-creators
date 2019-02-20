<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Repositories\Contracts\PostRepository;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * PostController constructor.
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {

        $posts = $this->posts->all();

        return response()->json(PostResource::collection($posts), 200);
    }
}
