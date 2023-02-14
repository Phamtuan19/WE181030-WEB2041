<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Customers;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\Brand;

use App\Models\Consignees;

use App\Models\Image;

use App\Models\Post;

use App\Models\Comment;

use App\Models\Categories;

class HomeController extends Controller
{

    public function layoutIndex()
    {

        $categories = Categories::all();

        view()->share('categories', $categories);

        return view('customer.layout.header');
    }

    public function indexHome()
    {
        $products = new Product();

        $brands = new Brand();

        $images = new Image();

        $categories = new Categories();

        $parent_category = $categories->whereNull('parent_id')->get()->toArray();

        foreach ($parent_category as $key => $value) {
            $parent_category[$key]['parent'] = $categories->where('parent_id', $value['id'])->get()->toArray();
        }

        // dd($parent_category);


        $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->get()->toArray();

        foreach ($products as $key => $product) {
            $products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray();
        }

        // dd($products);

        return view('customer.pages.home', compact('products', 'brands'));
    }

    public function indexProducts(Request $request)
    {
        $products = new Product();

        $brands = new Brand();

        $images = new Image();

        $categoryAll = new Categories();

        $orderBy = "DESC";

        $orderType = 'created_at';

        $category = '';

        $brand = '';

        $max_price = $products->select('price')->orderBy('price', 'desc')->first()->price; // giá lớn nhất

        $min_price = $products->select('price')->orderBy('price', 'ASC')->first()->price; // giá nhỏ nhất

        // lọc theo loại sản phẩm
        if (!empty($request->category)) {

            $category = $categoryAll->select('id')->where('slug', 'like', $request->category)->get();

            $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')
                ->where('category_id', $category[0]->id);
        }

        // lọc theo hãng
        if (!empty($request->brand)) {
            $brand = $brands->select('id')->where('name', $request->brand)->get();

            $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')
                ->where('brand_id', $brand[0]->id);
        }

        // lọc theo giá
        if (!empty($request->price)) {
            $price = $request->price;

            if ($request->price == 'duoi-3-trieu') {
                $max_price = 3000000;
            }

            if ($request->price == 'tu-3-8-trieu') {
                $min_price = 3000000;
                $max_price = 8000000;
            }

            if ($request->price == 'tu-8-15-trieu') {
                $min_price = 8000000;
                $max_price = 15000000;
            }


            if ($request->price == 'tren-15-trieu') {
                $min_price = '15000000';
            }

            $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')
                ->whereBetween('price', [$min_price, $max_price]);
        }


        if (!empty($request->orderBy) && !empty($request->orderType)) {
            $orderBy = $request->orderBy;
            $orderType = $request->orderType;
        }

        $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')
            ->orderBy($orderType, $orderBy);


        $products = $products->paginate(12);

        foreach ($products as $key => $product) {
            $products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get();
        }

        $brands = $brands->get();

        $categories = $categoryAll->where('parent_id', 1)->get();

        return view('customer.pages.products', compact('products', 'brands', 'categories'));
    }

    public function detailProduct($code)
    {
        $products =  new Product();

        $comments = new Comment();

        $query = $comments->get();

        $comments = $comments->whereNotNull('product_id')->whereNull('parent_id')->get();

        foreach ($comments as $key => $item) {
            $comments[$key]['parent'] = $query->where('parent_id', $item['id']);
        }

        // dd($comments);

        $product = $products->where('code', $code)->first();

        $brands = new Brand();

        $brands = $brands->get();

        $commentType = "product";

        return view('customer.pages.page_product', compact('product', 'brands', 'comments', 'commentType'));
    }

    public function indexCart(Request $request)
    {
        return view('customer.pages.cart');
    }

    public function orderSuccess()
    {

        $orders = new Order();

        $orders = $orders->get();

        return view('customer.pages.orderSuccess', compact('orders'));
    }

    public function indexPosts()
    {
        $posts = new Post();

        $posts = $posts->get();

        $date1 = "2023-02-08";
        $date2 = date('Y-m-d');

        // dd(_date_diff(strtotime($date1), time()));

        return view('customer.pages.post', compact('posts'));
    }

    public function showPosts(Post $post)
    {
        $comments = new Comment();

        $connect = $comments->get();

        $comments = $comments->whereNotNull('post_id')->whereNull('parent_id')->get();



        // dd($comments->toArray());
        foreach ($comments as $key => $item) {
            // dd($item->toArray());
            $comments[$key]['parent'] = $connect->where('parent_id', $item['id']);
        }

        // dd($comments->toArray());

        $commentType = "posts";

        return view('customer.pages.show_post', compact('post', 'comments', 'commentType'));
    }
}
