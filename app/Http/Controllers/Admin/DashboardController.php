<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        $orders = new Order();

        $orders = $orders->dashboard();


        // dd($orders);
        return view('admin.dashboard.dashboard', compact('orders'));
    }
}
