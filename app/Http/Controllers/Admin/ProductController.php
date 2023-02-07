<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Requests\Admin\Product\CreateProductRequest;

use Illuminate\Support\Facades\DB;

use App\Models\Attribute;

use App\Models\Categories;

use App\Models\Image;

use App\Models\Brand;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

        $category_parent = $categories->where('id', 1)->get();

        $subcategory = $categories->where('parent_id', $category_parent[0]->id)->get();

        $brands = $brands->get();

        // sử lý tìm kiếm

        $categoryKey = null;

        $brandKey = null;

        $keyword = null;

        if (!empty($request->category)) {
            $categoryKey = $request->category;
        }

        if (!empty($request->brand)) {
            $brandKey = $request->brand;
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

        $products = $products->searchAdmin($categoryKey, $brandKey, $keyword, $sortArr);


        return view('admin.products.index', compact('category_parent', 'subcategory', 'products', 'brands', 'sortType'));
    }

    public function create()
    {
        $categories = new Categories();

        $category = $categories->where('id', 1)->get();

        $categories = $categories->where('parent_id', $category[0]->id)->get();

        // dd($categories);

        $brands = DB::table('brands')->get();

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

    public function store(CreateProductRequest $request)
    {
        $products = new Product();

        $attributes = new Attribute();

        $table_Images = new Image();

        dd($request->all());

        $dataProduct = [
            'code' => rand(100000, 9000000),
            'name' => $request->name,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'import_price' => $request->import_price,
            'price' => $request->price,
            'promotion_price' => $request->promotion_price,
            'input_quantity' => $request->input_quantity,
            'quantity_stock' => $request->input_quantity,
            'information' => $request->information,
            'detail' => $request->detail,
        ];


        $saveProduct = $products->create($dataProduct);

        if ($saveProduct) {

            // Save Table Attribute
            $dataAttribute = [
                'product_id' => $saveProduct->id,
                'color' => json_encode($request->color),
                'memory' => json_encode($request->memory),
            ];

            $attributes->insert($dataAttribute);

            // Save Cloudinary and Table images
            if ($request->hasFile('images')) {

                $images = $request->file('images');

                foreach ($images as $index => $image) {
                    $url = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'duan_laravel/Products',
                    ]);

                    if ($index == 0) {
                        $dataImage = [
                            'product_id' => $saveProduct->id,
                            'path' => $url->getSecurePath(),
                            'public_id' => $url->getPublicId(),
                            'is_avatar' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                    } else {
                        $dataImage = [
                            'product_id' => $saveProduct->id,
                            'path' => $url->getSecurePath(),
                            'public_id' => $url->getPublicId(),
                            'is_avatar' => null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                    }

                    $table_Images->insert($dataImage);
                }
            }

            return back()->with('msg', 'Thêm sản phẩm thành công');
        }
    }

    public function show($id)
    {
        $product = $this->table->find($id);

        $categories = new Categories();

        $brands = new Brand();

        $categories = $categories->where('parent_id', 1)->get();

        $brands = $brands->get();

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

    public function update(Request $request, Product $product)
    {
        $attributes = new Attribute();

        $attribute = $attributes->where('product_id', $product->id)->get()[0];

        $table_Images = new Image();


        // Save Table Product
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->import_price = $request->import_price;
        $product->price = $request->price;
        $product->input_quantity = $request->input_quantity;
        $product->information = $request->information;
        $product->detail = $request->detail;

        $saveProduct = $product->save();

        if ($saveProduct) {

            // Save Table Attribute
            $attribute->color = json_encode($request->color);
            $attribute->memory = json_encode($request->memory);

            $attribute->save();

            // Save Cloudinary and Table images
            if ($request->hasFile('images')) {

                $images = $request->file('images');

                foreach ($images as $image) {
                    $url = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'duan_laravel/Products',
                    ]);

                    $dataImage = [
                        'product_id' => $product->id,
                        'path' => $url->getSecurePath(),
                        'public_id' => $url->getPublicId(),
                        'is_avatar' => null,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    $table_Images->insert($dataImage);
                }
            }

            return back()->with('msg', 'Thêm sản phẩm Thành công');
        }
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

    public function softErase(Request $request, Product $product)
    {

        // dd($request->method());
        if ($request->method() == 'PATCH') {

            if ($request->duty == 'restore') {
                $product->deleted_at = null;

                $product->save();

                return back()->with('msg', 'Khôi phục sản phẩm thành công');
            }

            $product->deleted_at = date('Y-m-d H:i:s');

            $product->save();

            return back()->with('msg', 'Đã đưa sản phẩm vào thùng rác');
        }
    }

    public function listSoftErase(Request $request)
    {
        $products = new Product();

        $categories = new Categories();

        $brands = new Brand();

        $category_parent = $categories->where('id', 1)->get();

        $subcategory = $categories->where('parent_id', $category_parent[0]->id)->get();

        $brands = $brands->get();

        // sử lý tìm kiếm

        $categoryKey = null;

        $brandKey = null;

        $keyword = null;

        if (!empty($request->category)) {
            $categoryKey = $request->category;
        }

        if (!empty($request->brand)) {
            $brandKey = $request->brand;
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

        $products = $products->searchProductDelete($categoryKey, $brandKey, $keyword, $sortArr);

        return view('admin.products.list_product_delete', compact('category_parent', 'subcategory', 'products', 'brands', 'sortType'));
    }
}
