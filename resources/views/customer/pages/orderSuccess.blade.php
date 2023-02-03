@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/orderSuccess.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="row my-4">

        @if (session('order_code'))
            <div class="alert alert-success text-center">
                {{ session('order_code') }}
            </div>
        @endif

        <div class="title-succsess mb-3">
            <h2 class="">
                Đặt hàng thành công!
            </h2>

            <p>Cảm ơn quá khách đã đặt hàng tại <b>Cửa hàng</b> chúng tôi!</p>
            <span>Đội ngũ chăm sóc khách hàng sẽ liên hệ sớm nhất có thể để sác nhận đơn hàng.</span>
        </div>

        <div class="information mb-4">
            @foreach ($orders as $order)
                @if ($order->code_order == session('order_code'))
                    <div class="information_order-code mb-3">
                        <b>Mã đơn hàng: #</b>
                        {{ $order->code_orders }}
                    </div>

                    <div class="mb-4">
                        <div class="information_user-info mb-4">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Thông tin khách hàng</span>
                        </div>

                        <table class="table table-striped " style="text-align: center">
                            <thead>
                                <tr style="border-top: 1px solid #ccc">
                                    <th scope="col" width="">Tên người mua</th>
                                    <th scope="col" width="">Tên người nhận</th>
                                    <th scope="col" width="30%">Địa chỉ</th>
                                    <th scope="col" width="10%">Số điện thoại</th>
                                    <th scope="col" width="30%">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="vertical-align: middle !important">
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->consignees[0]->name }}</td>
                                    <td>{{ $order->consignees[0]->specific_address }}</td>
                                    <td>{{ $order->consignees[0]->phone }}</td>
                                    <td>{{ $order->consignees[0]->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-4">
                        <div class="information_user-info mb-2">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Thông tin sản phẩm</span>
                        </div>

                        <table class="table table-striped " style="text-align: center">
                            <thead>
                                <tr style="border-top: 1px solid #ccc">
                                    <th scope="col">Mã SP</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetail as $detail)
                                    <tr style="vertical-align: middle !important">
                                        <td>{{ $detail->product->code }}</td>
                                        <td>
                                            <img src="{{ asset($detail->product->image[0]->image) }}" alt=""
                                                style="width: 80px; height: 60px;">
                                        </td>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ $detail->price }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="total_money">
                            <b>Tổng tiền:
                                <span>{{ currency_format($order->total_money) }}</span>
                            </b>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <button class="col-lg-2 mb-3 btn btn-primary btn-redirect">
            <a href="{{ route('store.home') }}" class="nav-link">
                Về trang chủ
            </a>
        </button>

    </div>
@endsection
