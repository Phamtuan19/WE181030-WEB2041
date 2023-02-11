<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                // 'username' => ['required', 'string', 'max:255', 'unique:users'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => [
                    'required',
                    // 'integer',
                    'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
                    Rule::unique('users'),
                ],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute không đúng định dạng',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'max' => ':attribute phải nhỏ howng :max ký tự',
                'unique' => ':attribute đã tồn tại',
                'email' => ':attribute không đúng định dạng email',
                'regex' => ':attribute không đúng định dạng',
                // 'integer' => ':attribute không phải là số',
                'confirmed' => ':attribute nhập lại không chính sác',
            ],
            [
                'name' => 'Tên tài khoản',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'password' => 'Mật khẩu',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position_id' => 3,
            'is_active' => null,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect(RouteServiceProvider::LOGIN);
    }
}
