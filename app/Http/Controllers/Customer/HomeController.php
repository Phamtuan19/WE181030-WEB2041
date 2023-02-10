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

class HomeController extends Controller
{

    public function indexHome()
    {
        $products = new Product();

        $brands = new Brand();

        $newProduct = $products->orderBy('created_at', 'DESC')->where('deleted_at', '=', null)->paginate(4);

        $brands = $brands->get();

        // dd($products);

        return view('customer.pages.home', compact('newProduct', 'brands'));
    }

    public function indexMobile(Request $request)
    {
        $products = new Product();

        $brands = new Brand();

        $images = new Image();

        $brands = $brands->get();

        // $productArr1 = $products->get();

        $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->get()->toArray();

        foreach ($products as $key => $product) {
            $products[$key]['avatar'] = $images->select('path')
                ->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray();
        }

        // dd($products);

        return view('customer.pages.products', compact('products', 'brands'));
    }

    public function indexProduct($id)
    {
        $products =  new Product();

        $product = $products->find($id);

        $brands = new Brand();

        $brands = $brands->get();

        return view('customer.pages.page_product', compact('product', 'brands'));
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

        $query = $comments->get();

        $comments = $comments->whereNull('parent_id')->get()->toArray();

        foreach ($comments as $key => $item){
            $comments[$key]['parent'] = $query->where('parent_id', $item['id'])->toArray();
        }

        // dd($comments);
        $arrComment = [];
        foreach ($comments as $item){
            if($item['post_id'] == $post->id){
                array_push($arrComment, $item);
            }
        }

        dd($arrComment);

        return view('customer.pages.show_post', compact('post'));
    }
}
