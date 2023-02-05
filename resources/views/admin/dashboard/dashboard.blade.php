@extends('admin.layout.index')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.5rem solid #4e73df !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2" style="font-size: 15px !important">
                                Doanh số
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ currency_format($totalOrderSuccess) }} VND
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
            <div class="card border-left-success shadow h-100 py-2" style="border-left: 0.5rem solid #858796 !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2" style="color: #858796 !important; font-size: 15px !important">
                                Đơn hàng chưa xác nhận
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($orderUnconfimred) }}
                                <br>
                                <span style="font-size: 16px; font-weight: 400;">Đơn hàng chưa được xác nhận.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border-left: 0.5rem solid #4e73df !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2" style="color: #4e73df !important; font-size: 15px !important">
                                Đơn hàng đã xác nhận
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($orderConfirmed) }}
                                <br>
                                <span style="font-size: 16px; font-weight: 400;">Đơn hàng đã được xác nhận.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.5rem solid #1cc88a !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-2" style="color: #1cc88a !important; font-size: 15px !important">
                                Đơn hàng thành công
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($orderSuccess) }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Đơn hàng giao thành công.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.5rem solid #f6c23e !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-2" style="color: #f6c23e !important; font-size: 15px !important">
                                Đang giao hàng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($orderShipping) }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Đơn hàng đang vận chuyển.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.5rem solid red !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-2" style="color: red !important; font-size: 15px !important">
                                Đơn hàng Hủy
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($orderError) }}
                                        <br>
                                        <span style="font-size: 16px; font-weight: 400;">Đơn hàng bị hủy</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="border-left: 0.5rem solid #00CCFF !important">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-2" style="color: #00CCFF !important; font-size: 15px !important">
                                Tổng sản Đã bán
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrderProduct }}
                                <br>
                                <span style="font-size: 16px; font-weight: 400;">Sản phẩm đã bán ra.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
