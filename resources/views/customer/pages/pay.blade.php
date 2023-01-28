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

                            <h1 class="text-center">Thông tin khách hàng</h1>

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Tên khách hàng</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $customer->full_name }}">
                                        @error('name')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $customer->phone }}">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label">Email <small>(không bắt
                                                buộc)</small></label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $customer->email }}">
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="" class="form-label" class="form-lable">Thành phố</label>
                                        <select class="form-select" aria-label="Default select example" name="province">
                                            <option selected value="{{ $customer->province }}">{{ $customer->province }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable">Quận / huyện</label>
                                        <select class="form-select" aria-label="Default select example" name="district">
                                            <option selected value="{{ $customer->district }}">{{ $customer->district }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable">Xã / phường</label>
                                        <select class="form-select" aria-label="Default select example" name="ward">
                                            <option selected value="{{ $customer->ward }}">{{ $customer->ward }}</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable">Số nhà</label>
                                        <input type="text" name="house_number" class="form-control" value="">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label" class="form-lable">Địa chỉ</label>
                                        <input type="text" name="specific_address" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Ghi chú</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-6">

                            <h1 class="text-center">Thông tin đơn hàng</h1>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="60%">Sản phẩm</th>
                                        <th scope="col" width="20%">Số lượng</th>
                                        <th scope="col" colspan="">Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>iPhone 14 Pro Max</td>
                                        <td>x 2</td>
                                        <td>30.990.000 đ</td>
                                        <input type="hidden" value="00834678" name="product_code[]">
                                        <input type="hidden" value="10" name="quantity[]">
                                    </tr>

                                    <tr>
                                        <td>iPhone 14 Pro Max</td>
                                        <td>x 2</td>
                                        <td>30.990.000 đ</td>
                                        <input type="hidden" value="00834678" name="product_code[]">
                                        <input type="hidden" value="20" name="quantity[]">
                                    </tr>

                                    <tr>
                                        <td><b>Tổng đơn hàng</b></td>
                                        <td colspan="2" style="text-align: right">
                                            <b>30.990.000 đ</b>
                                            <input type="hidden" name="total_money" value="30990000" class="total_money">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group my-4">

                                <h5>Hình thức thanh toán</h5>

                                <input type="radio" class="" id="payment_form" name="payment_form" value="1" checked>
                                <input type="hidden" value="2" name="quantity_product">

                                <label for="payment_form">Thanh toán khi nhận hàng</label>
                            </div>

                            <input type="submit" class="btn btn-primary order" value="Đặt hàng">
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function() {

        //     $('.order').click(function() {

        //         console.log($(".order").data('data-id'))

        //         const data = {
        //             name: $('input[name="name"]').val(),
        //             phone: $('input[name="phone"]').val(),
        //             province: $('select[name="province"]').val(),
        //             district: $('select[name="district"]').val(),
        //             ward: $('select[name="ward"]').val(),
        //             specific_address: $('input[name="specific_address"]').val(),
        //             note: $('input[name="note"]').val(),
        //             payment_form: $('input[name="paymentForm"]:checked').val(),
        //             payments_method_id: $('input[name="paymentsMethod"]:checked').val(),
        //             // customer_id: $('.order').
        //             cart_order: JSON.parse(localStorage.getItem('cart')),
        //         }

        //         $.ajax ({
        //             url: "http://127.0.0.1:8000/api/store/check-order",
        //             type: "POST",
        //             data: data,
        //             success: function(response){
        //                 console.log(response);
        //             }
        //         })
        //     })
        // })
    </script>
@endsection
