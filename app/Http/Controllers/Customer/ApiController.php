<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function indexProduct()
    {
        $data = Product::select('id', 'name', 'price', 'avatar')->search()->paginate(20);
        return $data;
    }
}
