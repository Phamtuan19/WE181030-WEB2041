<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Slider;

use Illuminate\Http\Request;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SliderController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = new Slider();

        // sử lý xắp xếp
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');

        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $sliders = $sliders->searchSlider($sortArr)->paginate(5);

        return view('admin.pages.index_slider', compact('sliders', 'sortType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlider(Request $request)
    {

        return view('admin.pages.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'images' => 'required',
            ],
            [
                'images.required' => 'Hình ảnh không được để trống',
            ]
        );

        if ($request->hasFile('images')) {

            $images = $request->file('images');

            foreach ($images as $image) {
                $url = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'duan_laravel/slider',
                ]);

                $data = [
                    'image_path' => $url->getSecurePath(),
                    'image_public_id' => $url->getPublicId(),
                    'is_active' => $request->is_active == 1 ? $request->is_active : null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $slider = Slider::insert($data);

                // dd($slider);

                return back()->with('msg', 'Thêm Ảnh Slider thành công');

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.pages.show_slider', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        // dd($request->all());

        if($request->hasFile('avatar')){
            if (Cloudinary::destroy($slider->image_public_id)) {

                $url = Cloudinary::upload($request->file('avatar')->getRealPath(), [
                    'folder' => 'duan_laravel/Brand',
                ]);

                $slider->image_path = $url->getSecurePath();
                $slider->image_public_id = $url->getPublicId();
                $slider->is_active = $request->is_active();
                $slider->timestamps = date('Y-m-d H:i:s');

                $slider->save();

                return back()->with('msg', 'Cập nhật thành công');
            }
        }else {
            $slider->is_active = $request->is_active == 1 ? $request->is_active : null;
            $slider->timestamps = date('Y-m-d H:i:s');

            $slider->save();

            return back()->with('msg', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    public function delete(Slider $slider)
    {
        if (Cloudinary::destroy($slider->image_public_id)) {

            $slider->delete();

            return back()->with('msg', 'Xóa thành công hình ảnh');

        }
    }
}
