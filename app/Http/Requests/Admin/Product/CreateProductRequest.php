<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'category' => ['required'],
            'brand' => ['required'],
            'name' => ['required'],
            'import_price' => ['required', 'integer', 'min:1'],
            'price' => [
                'required',
                'min:1',
                function ($attribute, $value, $fail) {
                    if (!empty($value)) {
                        if ($value <= $this->import_price) {
                            $fail("Giá bán phải lớn hơn giá nhập");
                        }
                    }
                }
            ],
            'promotion_price' => [
                function ($attribute, $value, $fail) {
                    if (!empty($value)) {
                        if ($value >= $this->price) {
                            $fail("Giá khuyến mãi phải nhỏ hơn giá bán");
                        }
                        if ($value < 1) {
                            $fail("Giá khuyến mãi phải lớn hơn 0");
                        }
                    }
                }
            ],
            'input_quantity' => ['required', 'integer', 'min:1'],
            'title' => ['required'],
            'images' => ['required'],
            // 'color' => [
            //     // 'required',
            //     function ($attribute, $value, $fail) {
            //         if ($this->category != '5') {
            //             if (isset($value)) {
            //                 $fail('Màu sản phẩm không được để trống');
            //             }
            //         }
            //     }
            // ],
            // 'memory' => [
            //     // 'required',
            //     function ($attribute, $value, $fail) {
            //         if ($this->category == '5') {
            //             // if ($value == null) {
            //             $fail('Bộ nhớ sản phẩm không được để trống');
            //             // }
            //         }
            //     }
            // ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'integer' => ':attribute phải là số',
            'min' => ':attribute phải là số dương'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'category' => 'Danh mục sản phẩm',
            'brand' => 'Hãng sản phẩm',
            'import_price' => 'Giá nhập',
            'price' => 'Giá bán',
            'input_quantity' => 'Số lượng sản phẩm',
            'title' => 'Mô tả sản phẩm',
            'detail' => 'Thông số kỹ thuật',
            'images' => 'hình ảnh sản phẩm',
            'promotion_price' => 'giá khuyến mãi'
        ];
    }
}
