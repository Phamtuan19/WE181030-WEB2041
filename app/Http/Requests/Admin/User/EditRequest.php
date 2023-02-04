<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'min:6',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'phone' => [
                'required',
                'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'position' => 'required',
            'is_active' => 'required',
            'password' => 'required|min:6|',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là ký tự',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute không đúng địng dạng',
            'string' => ':attribute không đúng địng dạng',
            'regex' => ':attribute không đúng định dạng',
            'max' => ':attribute không được quá :max ký tự',
            'min' => ':attribute phải lớn hơn :min ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tài khoản đăng nhập',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'role_id' => 'Role',
            'status' => 'Trạng thái',
            'password' => 'Mật khẩu',
        ];
    }
}
