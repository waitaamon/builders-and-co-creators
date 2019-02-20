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

    /**
     * json posts
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $posts = $this->posts->all();

        return response()->json(PostResource::collection($posts), 200);
    }

    /**
     * Return post
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

        $post = $this->posts->find($id);

        return response()->json(new PostResource($post), 200);
    }

}
