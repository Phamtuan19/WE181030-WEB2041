<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\Product;

use App\Models\OrderStatus;

use App\Models\OrderDetail;

use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);

        $orders = new Order();
        $products = new Product();

        $orderStatus = OrderStatus::all();

        $products = $products->get();

        // xử lý tìm kiếm
        $order_status = null;
        $keyword = null;

        if (!empty($request->order_status)) {
            $order_status = $request->order_status;
        }
        if (!empty($request->keyword)) {
            $keyword = $request->keyword;
        }

        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');

        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $orders = Order::search($order_status, $keyword, $sortArr);

        // dd($orders);

        return view('admin.order.list', compact('orders', 'products', 'orderStatus', 'sortType'));
    }

    public function show(Order $order)
    {

        $this->authorize('view', $order);


        if (Gate::allows('orders.edit', $order)) {
            $order_status = new OrderStatus();

            $order_status = $order_status->get();

            $order_details = new OrderDetail();

            $order_details = $order_details->where('order_id', $order->id)->get();

            // dd($order_details);

            return view('admin.order.show', compact('order', 'order_status', 'order_details'));
        }

        if (Gate::denies('orders.edit', $order)) {
            abort(403);
        }
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
