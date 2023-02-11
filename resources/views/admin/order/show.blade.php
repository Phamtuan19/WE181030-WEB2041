@extends('admin.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_layout/css/showOrder.css') }}">
@endsection

@section('page_heading')
    Chi tiết đơn hàng: # {{ $order->code_order }}
@endsection

@section('redirect')
    <a href="{{ route('admin.orders.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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

    {{-- info-customer --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">

                <div class="order-status mb-3">
                    <b>Trạng thái đơn hàng: </b>
                    @if ($order->orderStatus->id == 1)
                        <div class="btn btn-secondary">{{ $order->orderStatus->name }}</div>
                    @elseif ($order->orderStatus->id == 2)
                        <div class="btn btn-primary">{{ $order->orderStatus->name }}</div>
                    @elseif ($order->orderStatus->id == 3)
                        <div class="btn btn-warning">{{ $order->orderStatus->name }}</div>
                    @elseif ($order->orderStatus->id == 4)
                        <div class="btn btn-success">{{ $order->orderStatus->name }}</div>
                    @else
                        <div class="btn btn-danger">{{ $order->orderStatus->name }}</div>
                    @endif


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="@getbootstrap">
                        <i class="fa-solid fa-pen mr-2"></i>
                        Trạng thái & Ghi chú
                    </button>

                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="border: none; background-color: #fff;">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">
                                            Trạng thái đơn hàng:
                                        </label>
                                        <select name="order_status" id="order_status" class="form-control">
                                            @foreach ($order_status as $status)
                                                <option value="{{ $status->id }}" {!! $status->id == $order->order_statusID ? 'selected' : false !!}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Notes:</label>
                                        <textarea class="form-control" id="message-text" name="shop_notes"></textarea>
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

                <div class="title mb-3">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Thông tin đơn hàng</span>
                </div>

                <table id="dataTable" class="table table-striped " style="text-align: center">
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
                                    <img src="{{ $detail->product->image[0]->path }}" alt=""
                                        style="width: 80px; height: 80px !important">
                                </td>
                                <th>{{ $detail->product->name }}</th>
                                <td>{{ $detail->quantity }}</td>
                                <td>{!! $detail->quantity * $detail->product->price !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-3 mb-3">

                <div class="title mb-3">
                    <i class="fa-solid fa-circle-question"></i>
                    <span>Thông tin Khách hàng</span>
                </div>

                <div class="info-customer">
                    @foreach ($order->consignees as $value)
                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Họ & Tên người đặt hàng</p>
                            <span>{{ $order->user->username }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Họ & Tên người nhận</p>
                            <span>{{ $order->consignees[0]->name }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Số điện thoại</p>
                            <span>{{ $order->consignees[0]->phone }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Email</p>
                            <span>{{ $order->consignees[0]->email }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Địa chỉ</p>
                            <span> {{ $order->consignees[0]->ward }} - {{ $order->consignees[0]->district }} -
                                {{ $order->consignees[0]->province }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Thời gian đặt hàng</p>
                            <span>{{ $order->date_order }}</span>
                        </div>

                        <div class="customer_info mb-2">
                            <p class="customer_info-title">Ghi chú của người mua</p>
                            <span>{{ $order->user_notes }}</span>
                        </div>

                        @if (!empty($order->shop_notes))
                            <div class="customer_info mb-2">
                                <p class="customer_info-title">Ghi chú của shop</p>
                                <span>{{ $order->shop_notes }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
