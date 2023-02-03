<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Customers;

use App\Models\Order;

use App\Models\OrderDetail;

use App\Models\Consignees;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\Customer\PaymentRequest;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $customers = new Customers();

        $customer = $customers->find(Auth::guard('customers')->id());

        // $purchase_forms = DB::table('purchase_form')->get();

        // dd(Auth::guard('customers')->user());

        return view('customer.pages.pay', compact('customer'));
    }

    public function checkPayment(PaymentRequest $request)
    {

        // dd($request->all());

        $orders = new Order();

        $order_details = new OrderDetail();

        $consignees = new Consignees();

        $dataOrder = [
            'code_order' => rand(100000, 1000000),
            'customer_id' => Auth::guard('customers')->id(),
            'date_order' => date('Y-m-d H:i:s'),
            'user_notes' => $request->note,
            'order_statusID' => 1,
            'delivery_form' => $request->delivery_form,
            'quantity' => count($request->product_code),
            'total_money' => $request->total_money,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:'),
        ];
        // dd($dataOrder);

        $order = $orders->create($dataOrder);

        $order_id = $order->id;

        $dataConsignees = [
            'order_id' => $order_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'specific_address' => $request->specific_address,
        ];

        $consignees->insert($dataConsignees);

        $products_code = $request->product_code;

        $quantity = $request->quantity;

        $price = $request->price;

        foreach ($products_code as $index => $code) {
            $dataOrderDetail = [
                'order_id' => $order_id,
                'product_code' => $code,
                'price' => $price[$index],
                'quantity' => $quantity[$index],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:'),
            ];

            $order_details->insert($dataOrderDetail);
        }

        return redirect(route('store.orderSuccess'))->with('order_code', $order->code_orders);
    }
}
