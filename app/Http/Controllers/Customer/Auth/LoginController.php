<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;

use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('customer.auth.login');
    }

    public function username()
    {
        return 'email';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->username() => 'required|string|email',
                'password' => 'required|string|min:8',
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute không đúng định dạng',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'email' => ':attribute không đúng định dạng',
            ],
            [
                $this->username() => 'Email',
                'password' => 'Mật khẩu',
            ]
        );
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);

        $dataLogin = $request->except(['_token']);

        // elseif (isActiveCustomer($dataLogin['email']) == 'member') {

        //     $checkLogin = Auth::guard()->attempt($dataLogin);

        //     if ($checkLogin) {

        //         return redirect(RouteServiceProvider::CUSTOMERS);
        //     }

        //     return back()->with('msg', 'Email hoặc Mật khẩu không hợp lệ');

        // }

        if (isActiveCustomer($dataLogin['email']) == 'member') {
            $checkLogin = Auth::guard('customers')->attempt($dataLogin);

            if ($checkLogin) {

                return redirect(RouteServiceProvider::CUSTOMERS);
            }
            return back()->with('msg', 'Email hoặc Mật khẩu không hợp lệ');
        }

        return back()->with('msg', 'Tài khoản chưa đc kích hoạt hoặc bị khóa.');
    }

    public function index()
    {
        return view('customer.auth.index');
    }
}
