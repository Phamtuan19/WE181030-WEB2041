<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\Product;

use App\Models\OrderStatus;

use App\Models\OrderDetail;

class OrderController extends Controller
{
    //

    public function index()
    {

        $orders = new Order();
        $products = new Product();

        $orders = Order::select('*')->orderBy('id', 'DESC')->get();
        $products = $products->get();

        return view('admin.order.list', compact('orders', 'products'));
    }

    public function show(Order $order)
    {
        $order_status = new OrderStatus();

        $order_status = $order_status->get();

        $order_details = new OrderDetail();

        $order_details = $order_details->where('order_id', $order->id)->get();

        // dd($order_details);

        return view('admin.order.show', compact('order', 'order_status', 'order_details'));
    }

    public function update(Request $request, Order $order)
    {

        $order->order_statusID = $request->order_status;

        if ($request->method() === 'PATCH') {
            if ($request->order_status == 2) {
                $order->date_confirmation = date('Y-m-d H:i:');
            }

            if ($request->order_status == 4) {
                $order->date_delivered = date('Y-m-d H:i:');
            }

            if (!empty($request->shop_notes)) {
                $order->shop_notes = $request->shop_notes;
            }
            $order->save();

            return back()->with('msg', 'Thêm ghi chú thành công');
        }
    }
}
