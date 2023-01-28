<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Customers;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\OrderDetail;

use App\Models\Consignees;

use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

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

    public function create(Request $request)
    {
        $rules = [
            'customer_id' => 'required',
            'date_required' => 'required',
            'date_confirmation',
            'date_delivered',
            'notes',
            'order_statusID' => 'required',
            'payment_form' => 'required',
            'payments_method' => 'required',
        ];

        $messages = [
            'required' => ':attribute không được để trống',
        ];

        $request->validate($rules, $messages);

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->date_required = $request->date_required;
        $order->date_confirmation = $request->date_confirmation;
        $order->date_delivered = $request->date_delivered;
        $order->notes = $request->notes;
        $order->order_statusID = $request->order_statusID;
        $order->payment_form = $request->payment_form;
        $order->payments_method = $request->payments_method;

        $order->save();

        if ($order->id) {
            $response = [
                'status' => 'success',
                'data' => $order
            ];
        } else {
            $response = [
                "message" => 'Đã có lỗi sẩy ra',
                'status' => 'error',
                'data' => $order
            ];
        }
        return $response;
    }

    // public function checkOrder(Request $request)
    // {
    //     // dd(Auth::id());

    //     $order = new Order();

    //     $dataOrder = [
    //         'code_orders' => rand(10000, 10000000),
    //         'customer_id' => Auth::guard('customers')->id(),
    //         'date_order' => date('Y-m-d H:i:s'),
    //         'note' => $request->note,
    //         'order_statusID' => 1,
    //         'payments_method_id' => $request->payments_method_id,
    //         'payment_form' => $request->payment_form,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ];

    //     // dd($order->insert($dataOrder));

    //     $getToken = $request->header('authorization');

    //     $getToken = str_replace('Bearer', '', $getToken);

    //     $getToken = trim($getToken);

    //     $response = [
    //         'data' => PersonalAccessToken::findToken($getToken),
    //     ];
    //     // Customers::Where('id', Auth::guard('customers')->id())->get()

    //     return $request->user();
    // }
}
