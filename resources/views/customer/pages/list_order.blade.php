@extends('customer.layout.index')

@section('title', 'Trang sản phẩm')
<link rel="stylesheet" href="{{ asset('customer/css/list_order.css') }}">
@section('css')

@endsection

@section('content-product')
    <div class="container">
        <div class="row">

            <div class="_0obGFe">
                <a class="vAkdD0 r-S3nG" href="">
                    <span class="_0rjE9m">
                        Tất cả
                    </span>
                </a>
                @if (!empty($orderStatus))
                    @foreach ($orderStatus as $status)
                        <a class="vAkdD0" href="?status={{ $status->slug }}">
                            <span class="_0rjE9m">
                                {{ $status->name }}
                            </span>
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="table-order" style="background-color: #FFF; border-radius: 5px">


                @if (session('msg'))
                    <div class="alert alert-success text-center">
                        {{ session('msg') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">
                                Mã đơn hàng
                            </th>
                            <th scope="col">khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">
                                Số lượng
                            </th>
                            <th scope="col">
                                Tổng tiền
                            </th>
                            <th scope="col">
                                Trạng thái
                            </th>
                            <th scope="col">
                                Ngày đặt
                            </th>
                            <th scope="col" width="100px">Edit</th>
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
                                <td>{{ currency_format($order->total_money) }}</td>
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
                                            <a href="" class="btn" style="color: black;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                {{-- @dd($order->order_statusID) --}}
                                <td>
                                    @if ($order->order_statusID != 4 && $order->order_statusID != 5)
                                        <div class="">
                                            <div class="d-flex justify-content-around">
                                                <button id="cancel__order" class="btn btn-danger cancel__order" data-id="{{ $order->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Hủy
                                                    Đơn</button>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #FF0000">Hủy đơn hàng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="border: none; background-color: #fff;">
                            <i class="fa-regular"></i>
                        </button>
                    </div>
                    <form class="form-cancel__order" action="" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Notes:</label>
                                <textarea class="form-control" id="message-text" name="notes"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(".cancel__order").click(function () {
            $(".form-cancel__order").attr('action', 'http://127.0.0.1:8000/store/order/cancel/' + $(this).data('id'));
        });
    </script>
@endsection
