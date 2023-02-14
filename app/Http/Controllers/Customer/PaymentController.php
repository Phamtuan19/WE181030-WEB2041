<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Order;

use App\Models\OrderDetail;

use App\Models\Consignees;

use App\Models\Product;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\MailNotify;

use App\Http\Requests\Customer\PaymentRequest;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $users = new User();

        $users = $users->find(Auth::guard('customers')->id());

        return view('customer.pages.pay', compact('users'));
    }

    // Tạo đơn hàng mới
    public function checkPayment(PaymentRequest $request)
    {

        $quantity = 0;

        foreach ($request->quantity as $value) {
            $quantity += $value;
        }

        $totalMomey = $this->totalMoneyOrder($request);

        if (!empty($totalMomey)) {

            $saverOrder = $this->saverOrder($request, $totalMomey, $quantity);

            if (!empty($saverOrder)) {

        $this->saverOrderDetail($request, $saverOrder);

                $this->saverInfoUserOrder($request, $saverOrder);

                $this->sendEmail($request, $saverOrder);

                // dd($request->all());
                return back()->with('msg', 'ok');
            }
        }
    }


    // Lưu thông tin đơn hàng
    public function saverOrder($request, $totalMomey, $quantity)
    {
        $orders = new Order();

        $data = [
            'code_order' => rand(100000, 1000000),
            'customer_id' => Auth::guard('customers')->id(),
            'date_order' => date('Y-m-d H:i:s'),
            'user_notes' => $request->note,
            'order_statusID' => 1,
            'delivery_form' => $request->delivery_form,
            'quantity' => $quantity,
            'total_money' => $totalMomey,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:'),
        ];

        $orderSuccess = $orders->create($data);

        return $orderSuccess ? $orderSuccess : false;
    }

    // lưu thông tin chi tiết của đơn hàng
    public function saverOrderDetail($request, $saveOrder)
    {
        $products = new Product();

        $orderDetails = new OrderDetail();

        $products_code = $request->product_code;

        $colorArr = $request->color;

        $memoryArr = $request->memory;

        $quantityArr = $request->quantity;
        // dd($request->color);

        $color = null;

        $memory = null;

        foreach ($products_code as $code) {
            $product = $products->where('code', $code)->first();
            // dd($product);
            if ($product->count() > 0) {
                if ($product->promotion_price != null) {
                    $price = $product->promotion_price;
                } else {
                    $price = $product->price;
                }

                // dd($price);


                $dataProductDetail = [
                    'order_id' => $saveOrder->id,
                    'product_code' => $product->code,
                    'price' => $price,
                    'memory' => $memoryArr[$product->code],
                    'color' => $colorArr[$product->code],
                    'quantity' => $quantityArr[$product->code],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $orderDetails->insert($dataProductDetail);

                $product->quantity_stock -= $quantityArr[$product->code];
                $product->quantity_sold += $quantityArr[$product->code];

                $product->save();
            }
        }

        // dd('ok');
    }

    // Lưu thông tin của người mua hàng
    public function saverInfoUserOrder($request, $saveOrder)
    {

        $consignees = new Consignees();

        $dataRelus = [
            'order_id' => $saveOrder->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'specific_address' => $request->specific_address,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:'),
        ];

        $rel = $consignees->insert($dataRelus);

        return $rel ? $rel : false;
    }


    // Gửi mail cho người đặt hàng
    public function sendEmail($request, $saveOrder)
    {
        $orderDetails = new OrderDetail();

        $send = null;
        if (isset($request->email)) {

            $send = $request->email;
        } else {

            $send = Auth::guard('customers')->user()->email;
        }

        $orderDetails = $orderDetails->where('order_id', $saveOrder->id)->get();

        $data = [
            'order' => $saveOrder,
            'order_details' => $orderDetails,
            'ordering_person' => Auth::guard('customers')->user(),
        ];

        return Mail::to($send)->send(new MailNotify($data)) ? true : false;
    }

    // tính tổng tiền đơn hàng
    public function totalMoneyOrder($request)
    {

        $products_code = $request->product_code;

        $quantityArr = $request->quantity;

        $quantity = 0;

        foreach ($products_code as $index => $code) {

            $product = Product::select('price', 'promotion_price')->where('code', $code)->first();

            if (isset($product)) {

                // giá sản phẩm
                if ($product->promotion_price != null) {

                    $price = $product->promotion_price;
                } else {

                    $price = $product->price;
                }

                foreach ($quantityArr as $index => $value) {

                    if ($index == $code) {
                        $quantity += $price * $value;
                    }
                }
            }
        }

        return $quantity;
    }
}
