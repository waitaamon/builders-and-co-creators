<?php

namespace App\Http\Controllers\Admin;

use function App\Helpers\extract_topics;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\TopicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;
    /**
     * @var TopicRepository
     */
    protected $topics;

    /**
     * PostController constructor.
     * @param PostRepository $posts
     * @param TopicRepository $topics
     */
    public function __construct(PostRepository $posts, TopicRepository $topics)
    {
        $this->posts = $posts;
        $this->topics = $topics;
    }

    /**
     * Display a listing of post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $this->posts->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'body' => $request->body,
            'is_published' => $request->publish ? 1 : 0,
            'publish_date' => $request->publish ? Carbon::now() : null,
            'featured' => $request->featured ? 1 : 0
        ]);

        if(!$post) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create post, try again later!'
                    ]
                ]
            ], 422);
        }

        $this->posts->createTopics($post->id, extract_topics($request->topics));

        //save image
        $post->addMedia($request->file('featured_image'))->toMediaCollection('posts');

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->posts->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->posts->update($id, [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'body' => $request->body,
            'is_published' => $request->publish ? 1 : 0,
            'publish_date' => $request->publish ? Carbon::now() : null,
            'featured' => $request->featured ? 1 : 0
        ]);

        if(!$post) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update post, try again later!'
                    ]
                ]
            ], 422);
        }

        $this->posts->createTopics($id, extract_topics($request->topics));

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->posts->find($id);

        if(!$post->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete post, try again later!'
                    ]
                ]
            ],422);
        }

        $posts = $this->posts->all();

        return response()->json(PostResource::collection($posts),200);
    }

}
