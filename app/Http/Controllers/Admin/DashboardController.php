<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = new Order();

        $orders = $orders->dashboard();

        // dd($orders);

        // $orderUnconfimred = $orders->where('order_statusID', 1)->get();

        // $orderConfirmed = $orders->where('order_statusID', 2)->get();

        // $orderShipping = $orders->where('order_statusID', 3)->get();

        // $orderSuccess = $orders->where('order_statusID', 4)->get();

        // $orderError = $orders->where('order_statusID', 5)->get();

        // $orders = $orders->get();

        // $totalOrderProduct = 0;
        // $totalOrderSuccess = 0;
        // foreach ($orderSuccess as $item) {
        //     $totalOrderSuccess += $item->total_money;

        //     $totalOrderProduct += $item->quantity;
        // }

        return view('admin.dashboard.dashboard', compact('orders'));
    }
}
