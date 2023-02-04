<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orderSuccess = [];

        $totalOrderSuccess = 0;
        foreach ($orders as $order) {
            if($order->order_statusID == 4){

                $totalOrderSuccess += $order->total_money;

                array_push($orderSuccess, $order);
            }
        }
        // dd($a);
        // dd(count($orderSuccess));

        return view('admin.dashboard.dashboard', compact('orderSuccess', 'totalOrderSuccess'));
    }
}
