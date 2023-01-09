<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rule;

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
        $rules = [
            'name' => 'required|unique:brand',
            'avatar' => 'required',
        ];

        $message = [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
            'avatar.required' => 'Hình ảnh thương hiệu không được để trống',
        ];

        $request->validate($rules, $message);

        $public_path = 'uploads/brand/';

        $brand_image = uploadFile($public_path, $request->file('avatar'));

        $data = [
            'name' => $request->name,
            'brand_image' => $brand_image[0],
        ];

        $this->table->create($data);

        return back()->with('msg', 'Thêm danh thương hiệu thành công');
    }

    public function show($id)
    {
        $brand = $this->table->find($id);

        return view('admin.brand.show', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = $this->table->find($id);

        $rules = [
            'name' => [
                'required',
                Rule::unique('users')->ignore($id, 'id'),
            ],
        ];

        $message = [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.unique' => 'Tên thương hiệu đã tồn tại',
        ];

        $request->validate($rules, $message);

        $brand_img[] = $brand->brand_image;

        $public_path = 'uploads/brand/';

        $brand_image = [];

        // dd($request->file('avatar'));

        if($request->avatar){
            $avatar = $request->file('avatar');
            deleteFilePublic($brand_img);

            $brand_image = uploadFile($public_path, $avatar);
        }

        $data = [
            'name' => $request->name,
            'brand_image' => $brand_image[0],
        ];

        // dd($data)

        $brand->update($data);

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
