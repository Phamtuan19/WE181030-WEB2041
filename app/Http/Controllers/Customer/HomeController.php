<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\OrderDetail;

use App\Models\Consignees;

class HomeController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    public function indexHome()
    {
        $products = $this->products->getAll();

        return view('customer.home', compact('products'));
    }

    public function indexMobile(Request $request)
    {
        $products = DB::table('products')->select('name', 'price', 'avatar', 'detail')->orderBy('created_at', 'desc')->paginate(20);
        $brands = DB::table('brand')->get();

        // dd($request->brand);

        return view('customer.mobile', compact('products', 'brands'));
    }

    public function indexProduct($name, $id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        // dd($product[0]->code);
        // dd(json_decode($product[0]->image, true));

        return view('customer.page_product', compact('product'));
    }

    public function indexCart(Request $request)
    {
        // $product = DB::table('products')->where('code',)->get();
        // dd($request->code);
        // dd($request->path());
        return view('customer.cart');
    }

    public function indexPay(Request $request)
    {
        // dd(Auth::guard('customers')->id());

        $customers = new Customers();
        $customer = $customers->find(Auth::guard('customers')->id());
        $purchase_forms = DB::table('purchase_form')->get();
        // dd($purchase_forms);

        return view('customer.pages.pay', compact('customer', 'purchase_forms'));
    }

    public function orderSuccess()
    {

        $orders = new Order();

        $orders = $orders->get();

        // dd($orders);

        return view('customer.pages.orderSuccess', compact('orders'));
    }
}
