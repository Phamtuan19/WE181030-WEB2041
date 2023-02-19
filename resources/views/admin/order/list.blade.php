@extends('admin.layout.index')

@section('page_heading', 'Danh sách đơn hàng')

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container-fluid">

        <form action="">
            <div class="row">
                <div class="col-lg-3 form-group">
                    <select name="order_status" id="" class="form-control">
                        <option value="">--Tất cả trạng thái--</option>
                        @foreach ($orderStatus as $status)
                            <option value="{{ $status->slug }}"
                                {{ request()->order_status == $status->slug ? 'selected' : false }}>{{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3 form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm"
                        value="{{ request()->keyword }}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                </div>
            </div>
        </form>

        <div class="row">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            <a href="?sort-by=code_order&sort-type={{ $sortType }}">Mã đơn hàng
                                <i class="fa-solid fa-right-left right-left"></i>
                            </a>
                        </th>
                        <th scope="col">khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">
                            <a href="?sort-by=quantity&sort-type={{ $sortType }}">Số lượng
                                <i class="fa-solid fa-right-left right-left"></i>
                            </a>
                        </th>
                        <th scope="col">
                            <a href="?sort-by=total_money&sort-type={{ $sortType }}">Tổng tiền
                                <i class="fa-solid fa-right-left right-left"></i>
                            </a>
                        </th>
                        <th scope="col">
                            <a href="?sort-by=order_statusID&sort-type={{ $sortType }}">Trạng thái
                                <i class="fa-solid fa-right-left right-left"></i>
                            </a>
                        </th>
                        <th scope="col">
                            <a href="?sort-by=date_order&sort-type={{ $sortType }}">Ngày đặt
                                <i class="fa-solid fa-right-left right-left"></i>
                            </a>
                        </th>
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
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn"
                                            style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
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
