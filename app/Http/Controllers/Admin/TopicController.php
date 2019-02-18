<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Repositories\Contracts\TopicRepository;
use Illuminate\Http\Request;
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
     * Display a listing of topics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param TopicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        //permission

        foreach ($request->topics as $topic) {
            $this->topics->create([
                'title' => $topic['title']
            ]);
        }

        $topics = $this->topics->all();

        return response()->json(TopicResource::collection($topics), 200);
    }

    /**
     * Display the specified topic.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified topic in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
