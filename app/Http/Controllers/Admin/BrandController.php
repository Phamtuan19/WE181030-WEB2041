<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Brand;

use App\Models\Categories;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Gate;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BrandController extends Controller
{
    //

    protected $table;

    public function __construct()
    {
        $this->table = new Brand();
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Brand::class);

        $brands = new Brand();

        // Tìm kiếm
        $keywords = null;

        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
        }

        // Xắp xếp
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

        $brands = $brands->searchBrand($keywords, $sortArr)->paginate(10);

        return view('admin.brand.index', compact('brands', 'sortType'));
    }

    public function create()
    {
        $this->authorize('create', Brand::class);

        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $brands = new Brand();
        // dd($request->all());
        $rules = [
            'name' => 'required|unique:brands',
            // 'image' => 'required|mimes:jpeg,png,jpg',
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
            ]);

            $data = [
                'name' => $request->name,
                'path_image' => $url->getSecurePath(),
                'image_publicId' => $url->getPublicId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // dd($data);

            $brands->insert($data);

            return back()->with('msg', 'Thêm danh thương hiệu thành công');
        }
    }

    public function show($id)
    {
        $brand = $this->table->find($id);


        if (Gate::allows('brands.edit', $brand)) {

            return view('admin.brand.show', compact('brand'));
        }

        if (Gate::denies('brands.edit', $brand)) {
            abort(403);
        }
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

        if ($request->hasFile('avatar')) {

            if (Cloudinary::destroy($brand->path_image)) {

                $url = Cloudinary::upload($request->file('avatar')->getRealPath(), [
                    'folder' => 'duan_laravel/Brand',
                ]);

                $path = $url->getSecurePath();
                $publicId = $url->getPublicId();
            }

            $brand->path_image = $path;
            $brand->image_publicId = $publicId;
        }

        $brand->name = $request->name;
        $brand->category_id = json_encode($request->categories);
        $brand->timestamps = date('Y-m-d H:i:s');

        $brand->save();

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
