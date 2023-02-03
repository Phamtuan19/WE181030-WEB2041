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

        $brands = $brands->get();

        $products = $products->get();

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
