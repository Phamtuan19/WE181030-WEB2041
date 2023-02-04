<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Image;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin.media.index', compact('images'));
    }

    public function delete(Image $image)
    {
        $image->delete();

        return back()->with('msg', 'Xóa thành công hình ảnh');
    }
}
