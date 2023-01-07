<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    protected $table;

    public function __construct()
    {
        $this->table = new Category();
    }

    public function index()
    {
        $categories = $this->table->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:category',
            'type' => 'required',
        ];

        $message = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'type.required' => 'Loại danh mục không được để trống',
        ];

        $request->validate($rules, $message);

        $data = [
            'name' => $request->name,
            'type' => $request->type,
        ];

        $this->table->create($data);

        return back()->with('msg', 'Thêm danh mục thành công');
    }

    public function show($id)
    {
        $category = $this->table->find($id);

        return view('admin.category.show', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->table->find($id);

        $rules = [
            'name' => 'required|unique:category',
            'type' => 'required',
        ];

        $message = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'type.required' => 'Loại danh mục không được để trống',
        ];

        $request->validate($rules, $message);

        $data = [
            'name' => $request->name,
            'type' => $request->type,
        ];

        $category->update($data);

        return back()->with('msg', 'Sửa danh mục thành công');
    }

    public function destroy($id)
    {
        $this->table->destroy($id);

        return back()->with('msg', 'Xóa thành công danh mục');
    }
}
