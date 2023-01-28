@extends('admin.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_layout/css/showOrder.css') }}">
@endsection

@section('page_heading')
    Chi tiết đơn hàng: # {{ $order->code_orders }}
@endsection

@section('redirect')
    <a href="{{ route('admin.orders.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Danh sách đơn hàng
    </a>
@endsection

@section('content')
    {{-- info-customer --}}
    <div class="row">

        <div class="col-9">

            <div class="order-status mb-3">
                <b>Trạng thái đơn hàng: </b>
                <span class="order-status_name">{{ $order->orderStatus->name }}</span>
            </div>

            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="order-status_label form-group mb-4">
                    {{-- <label for="order_status" class="label-order_status">Trạng thái đơn hàng</label> --}}
                    <select name="order_status" id="order_status" class="form-control">
                        @foreach ($order_status as $status)
                            <option value="{{ $status->id }}" {!! $status->id == $order->order_statusID ? 'selected' : false !!}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('order_status')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Cập nhật">
            </form>

            <div class="title mb-3">
                <i class="fa-solid fa-circle-info"></i>
                <span>Thông tin đơn hàng</span>
            </div>

            <table class="table table-striped " style="text-align: center">
                <thead>
                    <tr style="border-top: 1px solid #ccc">
                        <th scope="col">STT</th>
                        <th scope="col" width="">Ảnh</th>
                        <th scope="col" width="">Tên sản phẩm</th>
                        <th scope="col" width="">Số lượng</th>
                        <th scope="col" width="">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $detail)
                        <tr>
                            <th>1</th>
                            <td>
                                <img src="http://127.0.0.1:8000/{{ $detail->product->avatar }}" alt=""
                                    style="width: 80px; height: 60px;">
                            </td>
                            <th>{{ $detail->product->name }}</th>
                            <td>{{ $detail->quantity }}</td>
                            <td>{!! $detail->quantity * $detail->product->price !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3">

            <div class="title mb-3">
                <i class="fa-solid fa-circle-question"></i>
                <span>Thông tin Khách hàng</span>
            </div>

            <div class="info-customer">
                @foreach ($order->consignees as $value)
                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Họ & Tên đặt hàng</p>
                        <span>{{ $order->customer->full_name }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Họ & Tên người nhận</p>
                        <span>{{ $value->name }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Số điện thoại</p>
                        <span>{{ $value->phone }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Email</p>
                        <span>{{ $value->email }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Địa chỉ</p>
                        <span> {{ $value->ward }} - {{ $value->district }} - {{ $value->province }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Thời gian đặt hàng</p>
                        <span>{{ $order->date_order }}</span>
                    </div>

                    <div class="customer_info mb-2">
                        <p class="customer_info-title">Ghi chú</p>
                        <span>{{ $order->note }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
