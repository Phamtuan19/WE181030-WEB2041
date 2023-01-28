<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Customers;

class LoginController extends Controller
{
    //
    protected function guard()
    {
        return Auth::guard('customers');
    }

    public function login()
    {
        return view('customer.auth.login');
    }

    public function postLogin(Request $request)
    {
        $dataLogin = $request->except(['_token']);

        if (isActiveCustomer($dataLogin['email'])) {
            $checkLogin = Auth::guard('customers')->attempt($dataLogin);

            if ($checkLogin) {

                return redirect(RouteServiceProvider::CUSTOMERS);
            }
            return back()->with('msg', 'Email hoặc Mật khẩu không hợp lệ');
        }

        return back()->with('msg', 'Tài khoản chưa đc kích hoạt');
    }

    public function index()
    {
        return view('customer.auth.index');
    }
}
