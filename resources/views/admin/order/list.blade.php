@extends('admin.layout.index')

@extends('admin.layout.model-confirm')

@section('page_heading', 'Danh sách đơn hàng')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/modal-confirm.css') }}">
@endsection

@section('redirect')
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Tạo đơn hàng
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
                            <td># {{ $order->code_order }}</td>
                            {{-- @dd($order->consignees) --}}
                            <td>{{ $order->consignees[0]->name }}</td>
                            <td>{{ $order->consignees[0]->phone }}</td>
                            <td>{{ $order->quantity }} (Sp)</td>
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
                                        <button class="btn btn-delete" id="btn" style="border: none; " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $order->code_order }}">
                                            <i class="fa-solid fa-trash" style="color: red"></i>
                                            <input type="submit" value="Xóa" class="d-none">
                                        </button>
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

@section('js')
    <script>
        $(document).ready(function() {
            $(".btn-delete").click(function() {
                console.log($(this).data("id"));
                $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/orders/" + $(this).data("id"));
                console.log($("#form-modal").attr('action'));
            })
        })
    </script>
@endsection
