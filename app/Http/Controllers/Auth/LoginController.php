<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // validation Login
    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->username() => 'required|string|',
                'password' => 'required|string|min:8',
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute không đúng định dạng',
                'min' => ':attribute phải lớn hơn :min ký tự',
            ],
            [
                $this->username() => 'Tài khoản đăng nhập',
                'password' => 'Mật khẩu',
            ]
        );
    }

    public function username()
    {
        return 'email';
    }

    // login failed
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => 'Đã sảy ra sự cố. Xin vui lòng kiểm tra thông tin tài khoản',
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['is_active'] = 1;

        return $credentials;
    }
}
