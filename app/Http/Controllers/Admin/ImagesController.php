<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Image;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagesController extends Controller
{
    public function updateAvatar(Request $request, Image $image)
    {
        $images = new Image();

        $images = $images->where('product_id', $image->product_id)->get();

        if($request->method() == "PATCH"){

            foreach($images as $value) {
                $value->is_avatar = null;

                $value->save();
            }

            $image->is_avatar = 1;

            $image->save();

            return back()->with('msg', 'Cập nhật ảnh đại diện sản phẩm thành công');
        }
    }

    public function updateImage(Request $request, Image $image)
    {
        if($request->method() == "PATCH"){
            if ($request->hasFile('image')) {

                if(Cloudinary::destroy($image->public_id)){

                    $url = Cloudinary::upload($request->file('image')->getRealPath(), [
                        'folder' => 'duan_laravel/Products',
                    ]);

                    // dd($url);

                    $image->path = $url->getSecurePath();
                    $image->public_id = $url->getPublicId();
                    $image->created_at = date('Y-m-d H:i:s');
                    $image->updated_at = date('Y-m-d H:i:s');

                    $image->save();

                    return back()->with('msg', 'Thay đổi hình ảnh thành công');
                }

                return back()->with('msg', 'Đã có lôi xảy ra vui lòng kiểm tra lại');
            }
            return back()->with('msg', 'Đã có lôi xảy ra vui lòng kiểm tra lại');
        }

        if($request->method() == "DELETE"){
            if(Cloudinary::destroy($image->public_id)){
                $image->delete();

                return back()->with('msg', 'Xóa hình ảnh thành công');
            }
        }
    }
}
