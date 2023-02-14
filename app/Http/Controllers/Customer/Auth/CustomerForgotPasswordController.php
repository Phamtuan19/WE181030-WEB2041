<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;

class CustomerForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('customer.auth.Password.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);

        $dataLogin = $request->except(['_token']);

        if (isActiveCustomer($dataLogin['email']) == 'member'){

            $response = $this->broker()->sendResetLink(
                request()->only('email')
            );

            if ($response == Password::RESET_LINK_SENT) {
                return back()->with('status', trans($response));
            }

            return back()->withErrors(
                ['email' => trans($response)]
            );

        }else {
            return back()->with('msgError', 'Email không hợp lệ');
        }
    }

    protected function broker()
    {
        return Password::broker('customers');
    }

    protected function validateEmail($request)
    {
        $request->validate(
            ['email' => 'required|email'],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
            ]
        );
    }
}
