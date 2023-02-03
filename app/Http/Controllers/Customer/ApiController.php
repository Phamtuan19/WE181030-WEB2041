<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Customers;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\OrderDetail;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function indexProduct()
    {
        $data = Product::select('id', 'name', 'price', 'avatar')->search()->get();
        return $data;
    }

    public function indexCart(Request $request)
    {
        $data = Product::select('code', 'name', 'price', 'avatar')->Carts()->get();
        // $data = auth()->guard('customers')->id();
        return $data;
    }

    public function indexCustomer (Request $request) {

        $customers = new Customers();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active,
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'specific_address' => $request->specific_address,
        ];

        if($customers->insert($data)){
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        }

        return $response;
    }
}
