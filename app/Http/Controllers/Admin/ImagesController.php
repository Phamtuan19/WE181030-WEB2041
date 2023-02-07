<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Image;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    // view create image
    public function create()
    {
    }

    // Method Post create
    public function store(Request $request)
    {
    }

    // Hiển thị một dữ liệu theo tham số truyền vào.
    public function show()
    {
    }

    // Cập nhật dữ liệu một danh mục theo tham số truyền vào.
    public function update(Request $request, Image $image)
    {
        if ($request->method() == "PATCH") {

            if ($request->hasFile('image')) {

                $image->public_id != null ? Cloudinary::destroy($image->public_id) : Cloudinary::destroy($image->path);

                $image_update = $request->file('image');

                $url = Cloudinary::upload($image_update->getRealPath(), [
                    'folder' => 'duan_laravel/Products',
                ]);

                $image->path = $url->getSecurePath();
                $image->public_id = $url->getPublicId();
                $image->is_avatar = null;
                $image->created_at = date('Y-m-d H:i:s');
                $image->updated_at = date('Y-m-d H:i:s');

                $image->save();

                return back()->with('msg', 'Thay đổi hình ảnh thành công.');
            }else {
                return back()->with('error', 'Đã có lỗi sảy ra vui lòng kiểm tra lại.');
            }
        }
    }

    // Xóa một dữ liệu theo tham số truyền vào.
    public function destroy(Request $request, Image $image)
    {
        Cloudinary::destroy($image->public_id);
        $image->delete();
        return back()->with('msg', 'Xóa thành công hình ảnh');
    }

    public function updateAvatar (Request $request, Image $image) {
        $images = new Image();

        $images = $images->where('product_id', $image->product_id)->get();

        foreach ($images as $item) {
            $item->is_avatar = null;

            $item->save();
        }

        $image->is_avatar = $request->is_avatar;

        $image->save();

        return back()->with('msg', 'cập nhật thành công');
    }
}
