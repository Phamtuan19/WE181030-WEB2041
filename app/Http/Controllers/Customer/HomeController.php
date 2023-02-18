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

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function indexHome()
    {
        $products = new Product();

        $images = new Image();

        $new_posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

        $selling_products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->orderBy('quantity_sold', 'DESC')->take(8)->get()->toArray();

        $new_products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->orderBy('created_at', 'DESC')->take(8)->get()->toArray();

        $other_products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->orderBy('created_at', 'ASC')->take(8)->get()->toArray();

        foreach ($selling_products as $key => $product) {
            $selling_products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray();
        }

        foreach ($new_products as $key => $product) {
            $new_products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray();
        }

        foreach ($other_products as $key => $product) {
            $other_products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray();
        }

        return view('customer.pages.home', compact('selling_products', 'new_products', 'other_products', 'new_posts'));
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

        return view('customer.pages.post', compact('posts'));
    }

    public function showPosts(Post $post)
    {
        $comments = new Comment();

        $connect = $comments->get();

        $comments = $comments->whereNotNull('post_id')->whereNull('parent_id')->get();


        foreach ($comments as $key => $item) {

            $comments[$key]['parent'] = $connect->where('parent_id', $item['id']);
        }

        $commentType = "post";

        return view('customer.pages.show_post', compact('post', 'comments', 'commentType'));
    }
}
