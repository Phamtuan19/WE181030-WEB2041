<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Brand;

use App\Models\Image;

use App\Models\Categories;

use App\Models\Comment;

use App\Models\Order;



use Illuminate\Support\Facades\DB;

class PageProductsController extends Controller
{
    public function indexProducts(Request $request)
    {
        $images = Image::query();

        $query = Product::query();

        $orderBy = "DESC";

        $getBrand = null;

        $price = $request->price;

        $min_price = 0;
        switch ($price) {
            case 'duoi-3-trieu':
                $max_price = 3000000;
                break;
            case 'tu-3-8-trieu':
                $min_price = 3000000;
                $max_price = 8000000;
                break;
            case 'tu-8-15-trieu':
                $min_price = 8000000;
                $max_price = 15000000;
                break;
            case 'tren-15-trieu':
                $min_price = 15000000;
                break;
        }

        if (isset($max_price)) {
            $query->whereBetween('price', [$min_price, $max_price]);
        } else {
            $query->where('price', '>=', $min_price);
        }

        if (!empty($request->brand)) {
            $brand = Brand::select('id')->where('name', 'like', '%' . $request->brand . '%')->get();
            $query->where('brand_id', $brand[0]->id);
        }

        if ($request->category) {
            $category = Categories::select('id')->where('slug', 'like', '%' . $request->category . '%')->get();
            if ($request->productType != null) {
                if ($request->productType == "tat-ca") {
                    $categoryParent = Categories::select('id')->where('parent_id', $category[0]->id)->get()->toArray();
                    $query->whereIn('category_id', array_column($categoryParent, 'id'));
                } else {
                    $category = Categories::select('id')->where('slug', 'like', '%' . $request->productType . '%')->get();
                    $query->where('category_id', $category[0]->id);
                }
            } else {
                $query->where('category_id', $category[0]->id);

            }

        }

        if ($request->orderType) {
            $column = $request->orderBy;
            $query->orderBy($column, $request->orderType);
        }

        $products =  $query->select('id', 'code', 'name', 'price', 'promotion_price', 'quantity_sold')->paginate(3);

        $brands = Brand::all();

        $accessoryCtegory = Categories::where('parent_id', '=', 13)->get();

        return view('customer.pages.products', compact('products', 'brands', 'accessoryCtegory', 'orderBy'));
    }

    public function showProducts(Request $request, $code)
    {
        $products =  new Product();

        $comments = new Comment();

        $brands = Brand::all();

        $query = $comments->get();

        $comments = $comments->whereNotNull('product_id')->whereNull('parent_id')->get();

        // foreach ($comments as $key => $item) {
        //     dd($item->children);
        //     $comments[$key]['parent'] = $query->where('parent_id', $item['id']);
        // }

        // dd($comments);
        $product = $products->where('code', $code)->first();

        $commentType = "product";


        return view('customer.pages.page_product', compact('product', 'brands', 'comments', 'commentType'));
    }
}
