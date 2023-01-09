<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\Admin\Product\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    protected $table;

    public function __construct()
    {
        $this->table = new Product();
    }

    public function index()
    {
        $products = $this->table->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('category')->get();
        $brands = DB::table('brand')->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(ProductRequest $request)
    {
        $public_path = 'uploads/products/';

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $avatar = uploadFile($public_path, $file);
        }

        if ($request->file('product_image')) {
            $files = $request->file('product_image');
            $imagesJson = uploadFile($public_path, $files);
        }

        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'sale' => $request->sale,
            // 'color' => $request->color,
            'avatar' => $avatar[0],
            'image' => json_encode($imagesJson),
            'title' => $request->title,
            'detail' => $request->detail,
        ];

        $createProduct = $this->table->create($data);
        dd('a');

        if ($createProduct) {
            return back()->with('msg', 'Thêm sản phẩm thành công');
        } else {
            deleteFilePublic($avatar);
            deleteFilePublic($imagesJson);
            return back()->with('msg', 'Thêm sản phẩm thất bại');
        }
    }

    public function show($id)
    {
        $product = $this->table->find($id);
        $categories = DB::table('category')->get();
        $brands = DB::table('brand')->get();
        return view('admin.products.show', compact('product', 'categories', 'brands'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->table->find($id);

        $public_path = 'uploads/products/';

        $product_avatar[] = $product->avatar;
        $imagesJson = json_decode($product->image, true);

        if($request->file('product_image')){
            $images = $request->file('product_image');

            deleteFilePublic($imagesJson);

            $imagesJson = uploadFile($public_path, $images);
        }

        if($request->file('avatar')){
            $avatar = $request->file('avatar');

            deleteFilePublic($product_avatar);

            $product_avatar = uploadFile($public_path, $avatar);
        }

        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'sale' => $request->sale,
            // 'color' => $request->color,
            'avatar' => $product_avatar[0],
            'image' => json_encode($imagesJson),
            'title' => $request->title,
            'detail' => $request->detail,
        ];

        $product->update($data);

        return back()->with('msg', 'Thay đổi thành công');
    }

    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->get();

        $product_avatar[] = $product[0]->avatar;
        $imagesJson = json_decode($product[0]->image, true);

        // dd($product);

        deleteFilePublic($product_avatar);
        deleteFilePublic($imagesJson);

        // if($a && $b){
            $this->table->destroy($id);
        // }

        return back()->with('msg', 'Xóa thành công');
    }
}
