@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/payment.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="div-fake" style="height: 70px"></div>

    <div class="row " style="background-color: #fff">

        <div class="col-12 mx-auto">

            <form action="{{ route('store.checkOrder') }}" method="POST">

                @csrf

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">

                            <h4 style="padding: 24px 0; text-align: center;">Thông tin khách hàng</h4>

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label"
                                            style="font-weight: 600; color: font-size: 16px">Tên khách hàng</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') ? old('name') : $customer->full_name }}"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                        @error('name')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label"
                                            style="font-weight: 600; color: font-size: 16px">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone') ? old('phone') : $customer->phone }}"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                        @error('phone')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label"
                                            style="font-weight: 600; color: font-size: 16px">Email <small>(không bắt
                                                buộc)</small></label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') ? old('email') : $customer->email }}"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                        @error('email')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Thành phố</label>
                                        <select class="form-select" aria-label="Default select example" name="province"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option selected value="{{ $customer->province }}">{{ $customer->province }}
                                            </option>
                                        </select>
                                        @error('province')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Quận / huyện</label>
                                        <select class="form-select" aria-label="Default select example" name="district"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option selected value="{{ $customer->district }}">{{ $customer->district }}
                                            </option>
                                        </select>
                                        @error('district')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Xã / phường</label>
                                        <select class="form-select" aria-label="Default select example" name="ward"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option selected value="{{ $customer->ward }}">{{ $customer->ward }}</option>
                                        </select>
                                        @error('ward')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Số nhà</label>
                                        <input type="text" name="house_number" class="form-control"
                                            value="{{ old('house_number') }}"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                        @error('house_number')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Địa chỉ</label>
                                        <input type="text" name="specific_address" class="form-control"
                                            value="{{ old('specific_address') }}"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                        @error('specific_address')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            style="font-weight: 600; color: font-size: 16px">Ghi chú</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">
                                            {{ old('note') }}
                                        </textarea>
                                        @error('note')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-6">

                            <div class="cart-detail">
                                <h4 style="padding: 24px 0; text-align: center;">Thông tin sản phẩm</h4>
                                <table class="table">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th scope="col" width="100px">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col" width="50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table_body">

                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between" style="flex: 1">
                                    <p><b>Tổng Cộng: </b></p>
                                    <input type="text" class="total-payment" name="total_money" value="0"
                                        readonly style=" flex: 3; border: none; text-align: end; padding: 3px 0;">
                                </div>

                                <p class="mt-3" style="font-weight: 600; color: font-size: 16px">Hình thức giao hàng</p>
                                <div class="form-check mt-1" style="vertical-align: inherit">
                                    <input class="form-check-input" type="radio" value="1" checked
                                        name="delivery_form" id="delivery_form">
                                    <label class="form-check-label" for="delivery_form"
                                        style="padding: 3px 0; background-color: #fff; font-size: 16px">
                                        Thanh toán khi nhận hàng
                                    </label>
                                </div>
                            </div>

                            <button type="submit" id="order" class="btn btn-primary mt-4 mx-auto"
                                style="width: 300px; height: 46px; line-height: 34px;">Đặt hàng</button>

                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const cartArr = JSON.parse(localStorage.getItem('cart'));

        if (Array.isArray(cartArr)) {
            $('.cart-table_body').html(cartArr.map((e) => {
                return `
                <tr style="vertical-align: middle;">
                    <td>
                        <img src="http://127.0.0.1:8000/${e.image}" alt="" style="width: 100%;">
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_code[]" value="${e.code}" hidden style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                            <input type="text" class="form-control"  value="${e.name}" readonly style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <lable for="" style="flex: 1; color: #86868B; font-size: 14px">Bộ nhớ: </lable>
                            <input type="text" class="form-control" name="memory[]" value="${e.memory}" readonly style="flex: 3; border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <lable for="" style="flex: 1; color: #86868B; font-size: 14px">Màu sắc: </lable>
                            <input type="text" class="form-control" name="color[]" value="${e.color}" readonly style="flex: 3; border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
                        </div>
                        <a href="http://127.0.0.1:8000/store/detail-product/${e.code}" style="color: #0066cc !important">Sửa</a>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" class="product_price" name="" value="${formatNumber(e.price, ',', '.')}" readonly style="padding: 6px 10px; background-color: #f5f5f7; font-size: 14px;">
                            <input type="text" class="product_price" name="price[]" value="${e.price}" hidden>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" name="quantity[]" value="${e.quantity}" readonly style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
                        </div>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash" style="color: #86868B"></i>
                    </td>
                </tr>
                `
            }))
        }

        console.log(formatNumber(renderTotalMoney(), ',', '.'));
        // $('.total-payment').val(formatNumber(renderTotalMoney(), ',', '.'));
        $('.total-payment').val(renderTotalMoney());

        let count = cartArr.length;
        $('quantity_product').val(count)

        $("#order").click(function() {
            localStorage.clear();
        })

    </script>
@endsection
