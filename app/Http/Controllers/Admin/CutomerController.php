<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customers;

class CutomerController extends Controller
{
    public function index ()
    {
        $customers = new Customers();

        $customers = $customers->get();

        return view('admin.customer.list', compact('customers'));
    }
}
