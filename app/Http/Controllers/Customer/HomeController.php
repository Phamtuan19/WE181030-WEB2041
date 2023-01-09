<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Customer\Route;
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

    public function indexCart (Request $request)
    {

        // dd($request->path());
        return view('customer.cart');
    }
}
