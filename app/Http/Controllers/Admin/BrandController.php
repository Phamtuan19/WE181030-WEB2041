<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Brand;

use Illuminate\Validation\Rule;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BrandController extends Controller
{
    //

    protected $table;

    public function __construct()
    {
        $this->table = new Brand();
    }

    public function index()
    {
        $brands = $this->table->get();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $brands = new Brand();

        $rules = [
            'name' => 'required|unique:brands',
            'image' => 'required|mimes:jpeg,png,jpg',
        ];

        $message = [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
            'image.required' => 'Hình ảnh thương hiệu không được để trống',
            'image.mimes' => 'Hình ảnh phải là loại jpeg, png, jpg',
        ];

        $request->validate($rules, $message);


        // $brand_image = uploadFile($public_path, $request->file('avatar'));

        if ($request->hasFile('image')) {

            $url = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'duan_laravel/Brand',
            ])->getSecurePath();

            $data = [
                'name' => $request->name,
                'path_image' => $url,
            ];

            $brands->insert($data);

            return back()->with('msg', 'Thêm danh thương hiệu thành công');
        }
    }

    public function show($id)
    {
        $brand = $this->table->find($id);

        return view('admin.brand.show', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        // dd($brand);

        $rules = [
            'name' => [
                'required',
                // Rule::unique('users')->ignore($brand->id, 'id'),
            ],
        ];

        $message = [
            'name.required' => 'Tên thương hiệu không được để trống',
            // 'name.unique' => 'Tên thương hiệu đã tồn tại',
        ];

        $request->validate($rules, $message);

        $brand_img[] = $brand->brand_image;

        $public_path = 'uploads/brand/';

        $brand_image = [];

        if ($request->avatar) {
            $avatar = $request->file('avatar');
            deleteFilePublic($brand_img);

            $brand_image = uploadFile($public_path, $avatar);
        }

        if (!empty($request->avatar)) {

            $brand->name = $request->name;
            $brand->brand_image = $brand_image[0];

            $brand->save();
        } else {
            $brand->name = $request->name;

            $brand->save();
        }

        return back()->with('msg', 'Sửa danh mục thành công');
    }

    public function destroy($id)
    {
        $brand = $this->table->find($id);

        $brand_img[] = $brand->brand_image;

        deleteFilePublic($brand_img);
        $brand->delete();

        return back()->with('msg', 'Xóa thành công danh mục');
    }
}
