<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categories;

use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    protected $table;

    public function __construct()
    {
        $this->table = new Categories();
    }

    public function index()
    {
        $categories = new Categories();

        $categories = $categories->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = new Categories();

        $categories = $categories->where('category_id', null)->get();

        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:category|max:255',
            'slug' => 'required|unique:category|max:255',
        ];

        $message = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên danh mục quá dài',
            'slug.required' => 'Loại danh mục không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
        ];

        $request->validate($rules, $message);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
        ];

        $this->table->create($data);

        return back()->with('msg', 'Thêm danh mục thành công');
    }

    public function show($id)
    {
        $categories = new Categories();

        $category = $categories->find($id);

        $categories = $categories->where('category_id', null)->get();

        return view('admin.category.show', compact('categories', 'category'));
    }

    public function update(Request $request, $id)
    {
        $categories = new Categories();

        $category = $categories->find($id);

        // dd($category);

        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ];

        $message = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục quá dài',
            'slug.required' => 'Loại danh mục không được để trống',
        ];

        $request->validate($rules, $message);

        if (!empty($request->category_id)) {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->category_id = $request->category_id;

            $category->save();
        } else {
            $category->name = $request->name;
            $category->slug = $request->slug;

            $category->save();
        }

        return back()->with('msg', 'Sửa danh mục thành công');
    }

    public function destroy($id)
    {
        $this->table->destroy($id);

        return back()->with('msg', 'Xóa thành công danh mục');
    }
}
