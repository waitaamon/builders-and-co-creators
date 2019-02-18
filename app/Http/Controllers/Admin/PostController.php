<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
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
     * Display a listing of topics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = $this->topics->all();

        return view('admin.posts.create', compact('topics'));
    }

    /**
     * Store a newly created topic in storage.
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

        $this->posts->createTopics($post->id, $this->extractedTopics(json_decode($request->topics)));

        //save image
        $post->addMedia($request->file('featured_image'))->toMediaCollection('posts');

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified topic in storage.
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
     * Remove the specified topic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function  extractedTopics($topics)
    {
        //topics
        $tpcs = [];

        foreach ($topics as $topic) {
            array_push($tpcs, $topic->value);
        }
        return $tpcs;
    }
}
