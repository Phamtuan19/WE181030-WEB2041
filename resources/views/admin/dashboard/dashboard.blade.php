@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.5rem solid #4e73df !important">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2"
                                    style="font-size: 15px !important">
                                    Doanh số
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ !empty(currency_format($orders['totalSales'])) ? currency_format($orders['totalSales']) : '0 VND' }}
                                    <br>
                                    <span style="font-size: 16px; font-weight: 400;">Doanh số cửa hàng.</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.orders.index') }}?order_status=chua-xac-nhan" class="nav-link"
                    style="padding: 0 !important">
                    <div class="card border-left-success shadow h-100 py-2"
                        style="border-left: 0.5rem solid #858796 !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-2"
                                        style="color: #858796 !important; font-size: 15px !important">
                                        Đơn hàng chưa xác nhận
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($orders['unconfirmedOrder']) }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Đơn hàng chưa được xác nhận.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.orders.index') }}?order_status=da-xac-nhan" class="nav-link"
                    style="padding: 0 !important">
                    <div class="card border-left-success shadow h-100 py-2"
                        style="border-left: 0.5rem solid #4e73df !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-2"
                                        style="color: #4e73df !important; font-size: 15px !important">
                                        Đơn hàng đã xác nhận
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($orders['orderConfirmed']) }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Đơn hàng đã được xác nhận.</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.orders.index') }}?order_status=dang-giao-hang" class="nav-link"
                    style="padding: 0 !important">
                    <div class="card border-left-info shadow h-100 py-2"
                        style="border-left: 0.5rem solid #f6c23e !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-2"
                                        style="color: #f6c23e !important; font-size: 15px !important">
                                        Đang giao hàng
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ count($orders['orderShipping']) }}
                                                <br>
                                                <span style="font-size: 16px; font-weight: 400;">Đơn hàng đang vận
                                                    chuyển.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.orders.index') }}?order_status=giao-hang-thanh-cong" class="nav-link"
                    style="padding: 0 !important">
                    <div class="card border-left-info shadow h-100 py-2"
                        style="border-left: 0.5rem solid #1cc88a !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-2"
                                        style="color: #1cc88a !important; font-size: 15px !important">
                                        Đơn hàng thành công
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ count($orders['orderSuccess']) }}
                                                <br>
                                                <span style="font-size: 16px; font-weight: 400;">
                                                    Đơn hàng giao thành công.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.orders.index') }}?order_status=huy-hang" class="nav-link"
                    style="padding: 0 !important">
                    <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.5rem solid red !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-2"
                                        style="color: red !important; font-size: 15px !important">
                                        Đơn hàng Hủy
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ count($orders['cancelOrder']) }}
                                                <br>
                                                <span style="font-size: 16px; font-weight: 400;">Đơn hàng bị hủy</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="" class="nav-link" style="padding: 0 !important">
                    <div class="card border-left-warning shadow h-100 py-2"
                        style="border-left: 0.5rem solid #00CCFF !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-2"
                                        style="color: #00CCFF !important; font-size: 15px !important">
                                        Tổng sản Đã bán
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $orders['productsSold'] }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Sản phẩm đã bán ra.</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="" class="nav-link" style="padding: 0 !important">
                    <div class="card border-left-warning shadow h-100 py-2"
                        style="border-left: 0.5rem solid #000000 !important">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-2"
                                        style="color: #000000 !important; font-size: 15px !important">
                                        Tổng sản phẩm trong kho
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $orders['totalProduct'] }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Số sản phẩm tồn kho.</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-lg-12" style="text-transform: uppercase;">
                <h5 style="font-weight: 600; color: #333">Đơn hàng mới</h5>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
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
                        <th scope="col" width="100px">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($orders['totalOrders']) --}}
                    @foreach ($orders['totalOrders'] as $index => $order)
                        <tr style="vertical-align: middle !important;">
                            <td>{{ $index + 1 }}</td>
                            <td># {{ $order->code_order }}</td>


                            @if (isset($order->consignees))
                                @foreach ($order->consignees as $consignees)
                                    @if (!empty($consignees->name))
                                        <td>{{ $consignees->name }}</td>
                                    @endif

                                    @if (!empty($consignees->phone))
                                        <td>{{ $consignees->phone }}</td>
                                    @endif
                                @endforeach
                            @endif

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
                            <td>{{ date_format($order->created_at, 'H:i:s d-m-Y') }}</td>

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
