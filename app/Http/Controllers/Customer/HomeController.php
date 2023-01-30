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

        // dd($brands);

        // $productsMobi = $products->where('category_id', )

        return view('customer.pages.home', compact('products', 'brands'));
    }

    public function indexMobile(Request $request)
    {
        $products = new Product();

        $brands = new Brand();

        $brands = $brands->get();

        $products = $products->get();

        // dd($request->brand);

        return view('customer.mobile', compact('products', 'brands'));
    }

    public function indexProduct($id)
    {
        $products =  new Product();

        $product = $products->find($id);

        $brands = new Brand();

        $brands = $brands->get();

        // dd($product);

        return view('customer.page_product', compact('product', 'brands'));
    }

    public function indexCart(Request $request)
    {
        // $product = DB::table('products')->where('code',)->get();
        // dd($request->code);
        // dd($request->path());
        return view('customer.cart');
    }

    // public function indexPay(Request $request)
    // {
    //     // dd(Auth::guard('customers')->id());

    //     $customers = new Customers();
    //     $customer = $customers->find(Auth::guard('customers')->id());
    //     $purchase_forms = DB::table('purchase_form')->get();
    //     // dd($purchase_forms);

    //     return view('customer.pages.pay', compact('customer', 'purchase_forms'));
    // }

    // public function orderSuccess()
    // {

    //     $orders = new Order();

    //     $orders = $orders->get();

    //     // dd($orders);

    //     return view('customer.pages.orderSuccess', compact('orders'));
    // }
}
