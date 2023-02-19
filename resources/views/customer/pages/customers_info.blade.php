@extends('customer.layout.index')

@section('title', 'Trang sản phẩm')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/customer_info.css') }}">
@endsection

@section('content-product')

    <div class="container">
        <div class="row my-4">
            <div class="col-lg-4 ">
                <div class="profile-pic-wrapper cart-header ">
                    <div class="pic-holder">
                        <!-- uploaded pic shown here -->
                        <img id="profilePic" class="pic"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3dtZ-vPoIcqlRl70r4dAIXxDSKQd3qB6FcQ&usqp=CAU">

                        <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto"
                            accept="image/*" style="opacity: 0;" />
                        <label for="newProfilePhoto" class="upload-file-block">
                            <div class="text-center">
                                <div class="mb-2">
                                    <i class="fa fa-camera fa-2x"></i>
                                </div>
                                <div class="text-uppercase">
                                    Update <br /> Profile Photo
                                </div>
                            </div>
                        </label>
                    </div>
                    <h4 class="text-info text-center">
                        {{ Auth::guard('customers')->user()->username }}
                    </h4>
                </div>

                <div class="cart-header">
                    <h5>Đổi mật khẩu</h5>

                    @if (session('msgError'))
                        <div class="alert alert-danger text-center">
                            {{ session('msgError') }}
                        </div>
                    @endif

                    @if (session('msg_password'))
                        <div class="alert alert-success text-center">
                            {{ session('msg_password') }}
                        </div>
                    @endif

                    <form action="{{ route('store.customer.editPassword', Auth::guard('customers')->user()) }}"
                        method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="old_password" class="form-label">Mật khẩu cũ</label>
                            <input type="password" name="old_password" class="form-control" id="old_password"
                                value="{{ old('old_password') }}" placeholder="Nhập mật khẩu cũ">
                            @error('old_password')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" id="password"
                                value="{{ old('password') }}" placeholder="Nhập mật khẩu mới">

                            @error('password')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" value="{{ old('password_confirmation') }}"
                                placeholder="Nhập lại mật khẩu mới">

                            @error('password_confirmation')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary" value="Xác nhận">

                    </form>

                </div>
            </div>
            <div class="col-lg-8">

                @if (session('msg'))
                    <div class="alert alert-success text-center">
                        {{ session('msg') }}
                    </div>
                @endif

                <div class="cart-header cart-header_info">

                    <h4>Thông tin cá nhân</h4>

                    <div class="edit_info">
                        <i class="fa-solid fa-pen-to-square fa-pen_edit"></i>
                        <i class="fa-regular fa-circle-xmark d-none fa-circle_edit"></i>
                    </div>

                    <form action="{{ route('store.customer.editInfo', Auth::guard('customers')->user()) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="form-label">Tên</label>
                            <input type="text" name="username" class="form-control form-control_info" id="username"
                                value="{{ old('username') ? old('username') : Auth::guard('customers')->user()->username }}"
                                disabled>

                            @error('username')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="text" name="email" class="form-control form-control_info" id="email"
                                value="{{ old('email') ? old('email') : Auth::guard('customers')->user()->email }}"
                                disabled>

                            @error('email')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control form-control_info" id="phone"
                                value="{{ old('phone') ? old('phone') : Auth::guard('customers')->user()->phone }}"
                                disabled>

                            @error('phone')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label" class="form-lable"
                                style="font-weight: 600; color: font-size: 16px">Thành phố</label>
                            <select class="form-select province form-control_info" id="province"
                                aria-label="Default select example" name="province"
                                style="height: 46px; color: #86868B; font-size: 14px" disabled>
                                <option value="">{{ Auth::guard('customers')->user()->province }}</option>
                            </select>
                            @error('province')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label" class="form-lable"
                                style="font-weight: 600; color: font-size: 16px">Quận / huyện</label>
                            <select class="form-select form-control_info" id="district" disabled=""
                                aria-label="Default select example" name="district"
                                style="height: 46px; color: #86868B; font-size: 14px">
                                <option selected value="">
                                    {{ Auth::guard('customers')->user()->district }}
                                </option>
                            </select>
                            @error('district')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label" class="form-lable"
                                style="font-weight: 600; color: font-size: 16px">Xã / phường</label>
                            <select class="form-select form-control_info" id="ward" disabled
                                aria-label="Default select example" name="ward"
                                style="height: 46px; color: #86868B; font-size: 14px">
                                <option selected value="">
                                    {{ Auth::guard('customers')->user()->ward }}
                                </option>
                            </select>
                            @error('ward')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label" class="form-lable"
                                style="font-weight: 600; color: font-size: 16px">Địa chỉ cụ thể</label>
                            <input type="text" name="specific_address" class="form-control form-control_info"
                                id="specific_address"
                                value="{{ old('specific_address') ? old('specific_address') : Auth::guard('customers')->user()->specific_address }}"
                                style="height: 46px; color: #86868B; font-size: 14px; text-transform: capitalize;"
                                disabled>

                            @error('specific_address')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary d-none btn-edit_info" value="Xác nhận">
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('customer/js/info.js') }}"></script>

    <script>
        $(document).ready(function() {
            console.log($(".edit_info"));
            $(".fa-pen_edit").click(function() {
                $(this).addClass("d-none")
                $(".fa-circle_edit").removeClass("d-none")
                $(".btn-edit_info").removeClass('d-none')
                $(".form-control_info").removeAttr('disabled');

                api();
            });

            $(".fa-circle_edit").click(function() {
                $(this).addClass("d-none")
                $(".fa-pen_edit").removeClass("d-none")
                $(".btn-edit_info").addClass('d-none')
                $(".form-control_info").attr('disabled', 'disabled');
            })
        });
    </script>

@endsection
