<?php

namespace App\Http\Controllers\Admin;

use function App\Helpers\extract_topics;
use App\Http\Requests\VideoRequest;
use App\Repositories\Contracts\VideoRepository;
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

    /**
     * Display a listing of the videos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->videos->all();

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $video = $this->videos->create([
            'user_id' => auth()->id(),
            'url' => $request->url,
            'title' => $request->title,
            'slug' => str_slug($request->title),
        ]);

        if(!$video) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not save video, try again later!'
                    ]
                ]
            ], 422);
        }

        $this->videos->createTopics($video->id, extract_topics(json_decode($request->topics)));

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = $this->videos->find($id);

        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->videos->find($id);

        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = $this->videos->update($id, [
            'user_id' => auth()->id(),
            'url' => $request->url,
            'title' => $request->title,
            'slug' => str_slug($request->title),
        ]);

        if(!$video) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update video, try again later!'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Remove the specified video from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->videos->delete($id)) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete video, try again later!'
                    ]
                ]
            ], 422);
        }
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
