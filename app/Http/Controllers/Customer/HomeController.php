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

class HomeController extends Controller
{

    public function indexHome()
    {
        $products = new Product();

        $brands = new Brand();

        $products = $products->get();

        $brands = $brands->get();

        return view('customer.pages.home', compact('products', 'brands'));
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
}
