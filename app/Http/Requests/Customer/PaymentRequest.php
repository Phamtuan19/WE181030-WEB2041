<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name' => 'required | max: 255',
            'email' => [
                function ($attribute, $value, $fail) {
                    if (!empty($value)) {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $fail('không đúng định dạng');
                        }
                    }
                }
            ],
            'phone' => [
                'required',
                'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
            ],
            'province' => 'required',
            "district" => "required",
            "ward" => "required",
            "specific_address" => "required",
            "delivery_form" => "required",
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'regex' => ':attribute không đúng định dạng',
            'max' => ':attribute không được quá :max ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'province' => 'Thành phố',
            "district" => "Quận / huyện",
            "ward" => "Xã / phường",
            "specific_address" => "Địa chỉ cụ thể",
            "delivery_form" => "Hình thức giao hàng",
        ];
    }
}
