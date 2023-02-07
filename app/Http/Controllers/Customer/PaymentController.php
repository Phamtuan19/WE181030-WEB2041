<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Customers;

use App\Models\Order;

use App\Models\OrderDetail;

use App\Models\Consignees;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\MailNotify;

use App\Http\Requests\Customer\PaymentRequest;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $customers = new Customers();

        $customer = $customers->find(Auth::guard('customers')->id());

        return view('customer.pages.pay', compact('customer'));
    }

    // Tạo đơn hàng mới
    public function checkPayment(PaymentRequest $request)
    {
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

        $saveOrder = $orders->create($dataOrder);

        $saveOrder_id = $saveOrder->id;

        $dataConsignees = [
            'order_id' => $saveOrder_id,
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
                'order_id' => $saveOrder_id,
                'product_code' => $code,
                'price' => $price[$index],
                'quantity' => $quantity[$index],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:'),
            ];

            $order_details->insert($dataOrderDetail);
        }

        // Gửi mail cho người đặt hàng

        $send = null;
        if(isset($request->email)){
            $send = $request->email;
        }else {
            $send = Auth::guard('customers')->user()->email;
        }

        $orderDetails = $order_details->where('order_id', $saveOrder->id)->get();

        $data = [
            'order' => $saveOrder,
            'order_details' => $orderDetails,
            'ordering_person' => Auth::guard('customers')->user(),
        ];

        Mail::to($send)->send(new MailNotify($data));

        return back()->with('msg', 'ok');
    }
}
