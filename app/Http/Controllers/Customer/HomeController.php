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

use App\Models\OrderStatus;

use App\Models\User;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function indexHome()
    {
        $products = new Product();

        $images = new Image();

        $new_posts = Post::orderBy('created_at', 'ASC')->take(3)->get();

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

        $brands = Brand::all();

        return view('customer.pages.home', compact('selling_products', 'new_products', 'other_products', 'new_posts', 'brands'));
    }

    public function indexCart(Request $request)
    {
        $brands = Brand::all();

        return view('customer.pages.cart', compact('brands'));
    }

    public function orderSuccess()
    {
        $brands = Brand::all();

        $orders = new Order();

        $orders = $orders->get();

        return view('customer.pages.orderSuccess', compact('orders', 'brands'));
    }

    public function indexPosts()
    {
        $posts = Post::all();

        $brands = Brand::all();

        return view('customer.pages.post', compact('posts', 'brands'));
    }

    public function showPosts(Post $post)
    {
        $brands = Brand::all();

        $comments = new Comment();

        $connect = $comments->get();

        $comments = $comments->whereNotNull('post_id')->whereNull('parent_id')->get();


        foreach ($comments as $key => $item) {

            $comments[$key]['parent'] = $connect->where('parent_id', $item['id']);
        }

        $commentType = "posts";

        return view('customer.pages.show_post', compact('post', 'comments', 'commentType', 'brands'));
    }

    public function listOrder(Request $request, User $user)
    {

        $orders = Order::query();

        $orders->where('customer_id', $user->id);

        $orderStatus = OrderStatus::query();

        $status = $request->status;

        if (!empty($status)) {
            $statusRequest = OrderStatus::select('id')->where('slug', $status)->get();
            $orders->where('order_statusID', $statusRequest[0]->id);
        }

        $orders = $orders->orderBy('created_at', 'DESC')->get();

        $orderStatus = $orderStatus->get();

        return view("customer.pages.list_order", compact('user', 'orders', 'orderStatus'));
    }

    public function cancelOrder(Request $request, Order $order)
    {

        // dd($request->method());

        $order->order_statusID = 5;

        $order->user_notes = !empty($request->notes) ? $request->notes : null;

        if ($order->update()) {
            return back()->with('msg', 'Hủy đơn hàng thành công');
        }
    }
}
