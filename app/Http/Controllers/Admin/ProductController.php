<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Requests\Admin\Product\ProductRequest;

use Illuminate\Support\Facades\DB;

use App\Models\Attribute;

use App\Models\Categories;

use App\Models\Image;

use App\Models\Brand;

class ProductController extends Controller
{
    //
    protected $table;

    public function __construct()
    {
        $this->table = new Product();
    }

    public function index(Request $request)
    {
        $products = new Product();

        $categories = new Categories();

        $brands = new Brand();

        $categories = $categories->where('parent_id', '8')->get();

        $brands = $brands->get();

        // sử lý tìm kiếm

        $categoryKey = null;

        $brnadKey = null;

        $keyword = null;

        if (!empty($request->category)) {
            $categoryKey = $request->category;
        }

        if (!empty($request->brand)) {
            $brnadKey = $request->brand;
        }

        if (!empty($request->keyword)) {
            $keyword = $request->keyword;
        }

        // sử lý xắp xếp
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

        $products = $products->searchAdmin($categoryKey, $brnadKey, $keyword, $sortArr);

        return view('admin.products.index', compact('products', 'categories', 'brands', 'sortType'));
    }

    public function create()
    {
        $categories = DB::table('category')->get();
        $brands = DB::table('brand')->get();

        $colors = [
            'Yellow' => '#FFFF00',
            'red' => '#FF0000',
            'black' => '#000000',
            'white' => '#FFFFFF',
        ];

        $memory = [
            '32GB',
            '64GB',
            '128GB',
            '256GB',
            '512GB',
            '1T'
        ];

        // dd($colors);

        return view('admin.products.create', compact('categories', 'brands', 'colors', 'memory'));
    }

    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $attributes = new Attribute();

        $images = new Image();

        $public_path = 'uploads/products/';

        $dataProduct = [
            'code' => rand(100000, 9000000),
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'import_price' => $request->import_price,
            'price' => $request->price,
            'input_quantity' => $request->input_quantity,
            'quantity_stock' => $request->input_quantity,
            'information' => $request->information,
            'detail' => $request->detail,
        ];

        $createProduct = $this->table->create($dataProduct);

        if ($createProduct) {
            // dd($request->file('images'));
            if ($request->file('images')) {
                $files = $request->file('images');
                $imagesJson = uploadFile($public_path, $files);
            }

            foreach ($imagesJson as $image) {
                $dataImage = [
                    'product_id' => $createProduct->id,
                    'image' => $image,
                    'is_avatar' => 0,
                ];

                $images->insert($dataImage);
            }

            $dataAttribute = [
                'product_id' => $createProduct->id,
                'color' => json_encode($request->color),
                'memory' => json_encode($request->memory),
            ];

            $attributes->insert($dataAttribute);

            return back()->with('msg', 'Thêm sản phẩm thành công');
        }

        return back()->with('msg', 'Thêm sản phẩm thất bại');
    }

    public function show($id)
    {
        $product = $this->table->find($id);

        $categories = DB::table('category')->get();

        $brands = DB::table('brand')->get();

        $colors = [
            'Yellow',
            'red',
            'black',
            'white',
        ];

        $memory = [
            '32GB',
            '64GB',
            '128GB',
            '256GB',
            '512GB',
            '1T'
        ];

        // dd($product->image);

        return view('admin.products.show', compact('product', 'categories', 'brands', 'colors', 'memory'));
    }

    public function update(Request $request, $id)
    {
        // dd(!empty($request->deleted_at));

        $products = new Product();

        $product = $products->find($id);

        $attributes = new Attribute();

        $attribute = $attributes->where('product_id', $id)->get()[0];

        $images = new Image();

        $public_path = 'uploads/products/';


        // Save Table Product
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->import_price = $request->import_price;
        $product->price = $request->price;
        $product->input_quantity = $request->input_quantity;
        $product->information = $request->information;
        $product->detail = $request->detail;

        $product->save();

        // Save Table Attribute
        if ($request->color) {
            $attribute->color = json_encode($request->color);
        }
        if ($request->memory) {
            $attribute->memory = json_encode($request->memory);
        }

        $attribute->update();

        // Save Table Image
        if (!empty($request->images)) {

            $files = $request->file('images');
            $imagesJson = uploadFile($public_path, $files);

            foreach ($imagesJson as $iamge) {
                $dataImage = [
                    'product_id' => $id,
                    'image' => $iamge,
                    'is_avatar' => 0,
                ];
                $images->insert($dataImage);
            }
        }

        return back()->with('msg', 'Thay đổi thành công');
    }

    public function destroy($id)
    {

        $product = Product::find($id);

        if (is_array($product->image)) {
            $imageArr = [];
            foreach ($product->image as $index => $image) {
                $imageArr[$index] = $image->image;
            }
            deleteFilePublic($imageArr);
        }

        $product->delete();

        return back()->with('msg', 'Xóa thành công');
    }

    // public function softErase(Request $request, $id)
    // {
    //     // dd($request->method());

    //     // if ($request->method() == 'PATCH') {

    //     $product = Product::find($id);

    //     // dd($product);

    //     $product->deleted_at = date('Y-m-d H:i:s');

    //     $product->save();

    //     return back()->with('msg', 'Đã đưa sản phẩm vào thùng rác');
    //     // }

    // }
}
