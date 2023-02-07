<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;

use App\Models\Customers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customer.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:Customers'],
                'phone' => [
                    'required',
                    'unique:Customers',
                    'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
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
                'confirmed' => ':attribute nhập lại không chính sác',
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'password' => 'Mật khẩu',
            ]
        );
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all())->validate();
        if($this->create($validator)){
            return back()->with('msg', 'Tạo thành công tài khoản mới.');
            dd($validator);
        }

        return back()->with('msg', 'Đã có lỗi sảy ra vui lòng thử lại.');
    }

    protected function create(array $data)
    {
        return Customers::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'is_active' => 1,
            'password' => Hash::make($data['password']),
        ]);
    }
}
