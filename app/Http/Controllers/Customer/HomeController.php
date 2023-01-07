<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    public function indexHome ()
    {
        $products = $this->products->getAll();

        return view('customer.home', compact('products'));
    }

    public function indexMobile ()
    {
        $products = DB::table('products')->select('name', 'price', 'avatar')->orderBy('created_at', 'desc')->paginate(20);
        $brands = DB::table('brand')->get();

        // dd($products);

        return view('customer.mobile', compact('products', 'brands'));
    }

    public function indexProduct ($name, $id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        // dd($product);
        return view('customer.page_product', compact('product'));
    }
}
