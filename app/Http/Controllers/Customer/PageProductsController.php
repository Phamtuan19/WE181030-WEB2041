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

        $orderType = 'created_at';

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


        if ($request->brand) {
            $brand = Brand::select('id')->where('name', 'like', '%' . $request->brand . '%')->get();
            $query->where('brand_id', $brand[0]->id);
        }

        if ($request->category) {
            $category = Categories::select('id')->where('slug', 'like', '%' . $request->category . '%')->get();
            $query->where('category_id', $category[0]->id);
        }

        if ($request->orderType) {
            $column = $request->orderBy;
            $query->orderBy($column, $request->orderType);
        }

        $products =  $query->select('id', 'code', 'name', 'price', 'promotion_price', 'quantity_sold')->paginate(3);

        $brands = Brand::all();

        $accessoryBrand = Categories::where('parent_id', '=', 13)->get();

        return view('customer.pages.products', compact('products', 'brands', 'accessoryBrand'));
    }

    public function showProducts($code)
    {
        $products =  new Product();

        $comments = new Comment();

        $query = $comments->get();

        $comments = $comments->whereNotNull('product_id')->whereNull('parent_id')->get();

        foreach ($comments as $key => $item) {
            $comments[$key]['parent'] = $query->where('parent_id', $item['id']);
        }

        $product = $products->where('code', $code)->first();

        $brands = new Brand();

        $brands = $brands->get();

        $commentType = "product";

        return view('customer.pages.page_product', compact('product', 'brands', 'comments', 'commentType'));
    }
}
