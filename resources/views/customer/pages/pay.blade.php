@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/payment.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')

    @if (session('msg'))
        <div class="modal fade show modal-show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: block; top: -25px" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
                    <div class="modal-body mt-4" style="text-align: center">
                        <i class="fa-solid fa-circle-check" style="font-size: 50px; color: #1cc88a"></i>
                        <p class="mt-3" style="font-size: 18px; font-weight: 600">Đặt hàng thành công</p>
                    </div>
                    <button type="button" class="btn btn-primary mx-auto my-3 sucess-btn" data-bs-dismiss="modal">Về trang
                        chủ</button>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="div-fake" style="height: 70px"></div> --}}

    <div class="container  mt-2 mb-4">
        <div class="row " style="background-color: #fff">

            <div class="col-12 pb-3">

                <form action="{{ route('store.ckeck.order') }}" method="POST">

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
                                                value="{{ old('name') ? old('name') : $users->username }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('name')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ old('phone') ? old('phone') : $users->phone }}"
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
                                                value="{{ old('email') ? old('email') : $users->email }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('email')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-4">
                                            <label for="" class="form-label" class="form-lable"
                                                style="font-weight: 600; color: font-size: 16px">Thành phố</label>
                                            <select class="form-select province" id="province" aria-label="Default select example" name="province"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                                <option value="">--- Chọn Thành Phố ---</option>
                                            </select>
                                            @error('province')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label" class="form-lable"
                                                style="font-weight: 600; color: font-size: 16px">Quận / huyện</label>
                                            <select class="form-select" id="district" disabled="" aria-label="Default select example" name="district"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                                <option selected value="">
                                                    --- Chọn Quận huyện ---
                                                </option>
                                            </select>
                                            @error('district')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label" class="form-lable"
                                                style="font-weight: 600; color: font-size: 16px">Xã / phường</label>
                                            <select class="form-select" id="ward" disabled aria-label="Default select example" name="ward"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                                <option selected value="">
                                                    --- Chọn Xã Phường
                                                </option>
                                            </select>
                                            @error('ward')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label" class="form-lable"
                                                style="font-weight: 600; color: font-size: 16px">Thôn xóm / số nhà</label>
                                            <input type="text" name="house_number" class="form-control"
                                                id="house_number" value="{{ old('house_number') }}"
                                                style="height: 46px; color: #86868B; font-size: 14px; text-transform: capitalize;" disabled>
                                            @error('house_number')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="" class="form-label" class="form-lable"
                                                style="font-weight: 600; color: font-size: 16px">Địa chỉ</label>
                                            <input type="text" name="specific_address" class="form-control"
                                                id="specific_address" value="{{ old('specific_address') }}"
                                                style="height: 46px; color: #86868B; font-size: 14px; text-transform: capitalize;">
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

                                    <p class="mt-3" style="font-weight: 600; color: font-size: 16px">Hình thức giao hàng
                                    </p>
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
    </div>
@endsection

@section('js')

    <script src="{{ asset('customer/js/payment.js') }}"></script>

@endsection
