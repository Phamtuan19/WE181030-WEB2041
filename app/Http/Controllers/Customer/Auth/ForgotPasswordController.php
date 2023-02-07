<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function index()
    {
        return view('customer.auth.Password.email');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(
            ['email' => 'required|email'],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
            ]
        );
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $status  = Password::sendResetLink(
            $request->only('email')
        );

        return $status  === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
