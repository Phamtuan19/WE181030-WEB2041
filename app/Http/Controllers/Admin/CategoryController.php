<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categories;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    protected $table;

    public function __construct()
    {
        $this->table = new Categories();
    }

    public function index()
    {

        $this->authorize('viewAny', Categories::class);

        $categories = new Categories();

        $categories = $categories->get();

        // $categories = $categories->subCategory($categories);
        // dd($categories);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Categories::class);

        $categories = new Categories();

        $categories = $categories->get();

        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {


        $categories = new Categories();

        $rules = [
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories|max:255',
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
            'parent_id' => $request->parent_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // dd($data);

        $categories->insert($data);

        return back()->with('msg', 'Thêm danh mục thành công');
    }

    public function show(Categories $category)
    {
        $this->authorize('view', $category);

        if (Gate::allows('categories.edit', $category)) {
            $categories = new Categories();

            $categories = $categories->get();

            return view('admin.category.show', compact('categories', 'category'));
        }

        if (Gate::denies('categories.edit', $category)) {
            abort(403);
        }
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

        if (!empty($request->parent_id)) {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->parent_id = $request->parent_id;
            $category->timestamps = date('Y-m-d H:i:s');

            $category->save();
        } else {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->timestamps = date('Y-m-d H:i:s');

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
