<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderImageRequest;
use App\Repositories\Contracts\ImageSliderRepository;
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

    /**
     * Display a listing of the images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider-images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider-images.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(SliderImageRequest $request)
    {

        $image = $this->images->create([
            'user_id' => auth()->id(),
            'order' => $request->order,
            'identifier' => str_random(),
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url,
        ]);

        if(!$image) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not save, try again later'
                    ]
                ]
            ],422);
        }

        $image->addMedia($request->file('slider_image'))->toMediaCollection('sliders');

        return response()->json([
            'message' => 'success'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'message' => 'success'
        ],200);
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->images->find($id)->delete();

        if(!$image) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete, try again later'
                    ]
                ]
            ],422);
        }

        return response()->json([
            'message' => 'success'
        ],200);
    }
}
