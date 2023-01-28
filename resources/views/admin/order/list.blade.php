@extends('admin.layout.index')

@section('page_heading', 'Doasboard')

@section('redirect')
    <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Danh sách đơn hàng
    </a>
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col" width="100px">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr style="vertical-align: middle !important;">
                            <td>{{ $order->code_orders }}</td>
                            <td>{{ $order->customer->full_name }}</td>
                            <td>{{ $order->customer->phone }}</td>
                            <td>{{ $order->quantity }} (sản phẩm)</td>
                            <td>{{ $order->total_money }}</td>
                            <td>
                                @if ($order->order_statusID == 1)
                                    <div class="btn btn-secondary">{{ $order->orderStatus->name }}</div>
                                @elseif ($order->order_statusID == 2)
                                    <div class="btn btn-primary">{{ $order->orderStatus->name }}</div>
                                @elseif ($order->order_statusID == 3)
                                    <div class="btn btn-warning">{{ $order->orderStatus->name }}</div>
                                @elseif ($order->order_statusID == 4)
                                    <div class="btn btn-success">{{ $order->orderStatus->name }}</div>
                                @else
                                    <div class="btn btn-danger">{{ $order->orderStatus->name }}</div>
                                @endif
                            </td>
                            <td>{{ $order->date_order }}</td>

                            <td class="" style="height: 100;">
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn"
                                            style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="" class="btn" style="color: red">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection
