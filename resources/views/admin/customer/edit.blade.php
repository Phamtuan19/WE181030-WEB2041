@extends('admin.layout.index')

@section('page_heading', '')

@section('redirect')
    <a href="{{ route('admin.customers.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Danh sách quản trị viên
    </a>
@endsection

@section('content')
    {{-- @if (!empty($customer)) --}}

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="" method="POST">

            @csrf

            @method('PATCH')

            <div class="row">
                <div class="col-lg-6 form-group">
                    <label for="name">Tài khoản đăng nhập</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{!! empty(old('name')) ? $customer->name : old('name') !!}" placeholder="Nhập tài khoản đăng nhập">
                    @error('name')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6 form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{!! empty(old('email')) ? $customer->email : old('email') !!}"
                        placeholder="Nhập địa chỉ email ...">
                    @error('email')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6 form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{!! empty(old('phone')) ? $customer->phone : old('phone') !!}"
                        placeholder="Nhập số điện thoại ...">
                    @error('phone')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6 form-group">
                    <label for="is_active">Trạng thái tài khoản</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="">--- chọn ---</option>
                        <option value="0" {!! $customer->is_active == 0 ? 'selected' : false !!}>Vô hiệu hóa</option>
                        <option value="1" {!! $customer->is_active == 1 ? 'selected' : false !!}>Kích hoạt</option>
                    </select>

                    @error('is_active')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-6 form-group">
                    <label for="province">Tỉnh / Thành phố</label>
                    <select class="form-control" id="province" name="province">
                        <option value="">--- chọn ---</option>
                        <option value="{{ $customer->province }}" selected>{{ $customer->province }}</option>
                    </select>

                    @error('province')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-6 form-group">
                    <label for="district">Quận / Huyện</label>
                    <select class="form-control" id="district" name="district">
                        <option value="">--- chọn ---</option>
                        <option value="{{ $customer->district }}" selected>{{ $customer->district }}</option>
                    </select>

                    @error('district')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-6 form-group">
                    <label for="ward">Xã / Phường</label>
                    <select class="form-control" id="ward" name="ward">
                        <option value="">--- chọn ---</option>
                        <option value="{{ $customer->ward }}" selected>{{ $customer->ward }}</option>
                    </select>

                    @error('ward')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-6 form-group">
                    <label for="specific_address">Địa chỉ cụ thể</label>
                    <input type="text" class="form-control" name="specific_address" value="{{ $customer->specific_address }}">

                    @error('specific_address')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-6 form-group">
                    <label for="password">Mật Khẩu Mới</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Nhập mật khẩu ...">
                    @error('password')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>


            </div>

            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: red">Cảnh Báo</h5>
                            <button type="button" class="btn-close" style="border: none; background-color: #fff"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body content-modal">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <p class="content-modal_title">
                                Xác nhận cập nhật dữ liệu
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <form id="form-modal" action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="none" class="btn btn-success">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <button class="btn btn-success mb-3 ml-3 btn-submit" name="submit" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Áp dụng</button>
    </div>
    {{-- @else
        <h2>Người dùng không tồn tại</h2>
    @endif --}}
@endsection

@section('js')
    <script>
        // $(':input').keydown(function(e) {
        //     if (e.keyCode == 13) {
        //         $(".btn-submit").click;
        //     }
        // })
    </script>
@endsection
