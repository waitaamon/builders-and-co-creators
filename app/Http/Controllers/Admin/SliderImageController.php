<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderImageRequest;
use App\Http\Resources\SliderImageResource;
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
     * @param SliderImageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderImageRequest $request)
    {
        //check order and change
        $this->changeOrder($request->order);

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
    public function update(SliderImageRequest $request, $id)
    {
        //check order and change
        $this->changeOrder($request->order);

        $image = $this->images->update($id, [
            'user_id' => auth()->id(),
            'order' => $request->order,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url
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

        $images = $this->images->all();

        return response()->json(SliderImageResource::collection($images),200);
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->images->find($id);

        if(!$image->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete, try again later'
                    ]
                ]
            ],422);
        }

        $images = $this->images->all();

        return response()->json(SliderImageResource::collection($images),200);
    }

    protected function changeOrder($order)
    {
        $img = $this->images->findWhere('order', $order);

        if($img)
        {
            $this->images->update($img->id, ['order' => '']);
        }

        return true;
    }
}
