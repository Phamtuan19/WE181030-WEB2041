@extends('admin.layout.index')

@section('page_heading', '')

@section('redirect')
    <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Danh sách quản trị viên
    </a>
@endsection

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (!empty($user))

        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên tài khoản</label>
                <input type="text" class="form-control" id="name" name="name" value="{!! empty(old('name')) ? $user->name : old('name') !!}"
                    placeholder="Nhập tên tài khoản">
                @error('name')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Tài khoản đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" value="{!! empty(old('username')) ? $user->username : old('username') !!}"
                    placeholder="Nhập tài khoản đăng nhập">
                @error('username')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{!! empty(old('email')) ? $user->email : old('email') !!}"
                    placeholder="Nhập địa chỉ email ...">
                @error('email')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{!! empty(old('phone')) ? $user->phone : old('phone') !!}"
                    placeholder="Nhập số điện thoại ...">
                @error('phone')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" value="{!! empty(old('address')) ? $user->address : old('address') !!}"
                    placeholder="Nhập địa chỉ ...">
                @error('address')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="position">Quyền</label>
                <select class="form-control" id="role" name="position">
                    <option value="">--- chọn ---</option>
                    <option value="1" {!! $user->position_id == 1 ? 'selected' : false !!}>Quản trị viên</option>
                    <option value="2" {!! $user->position_id == 2 ? 'selected' : false !!}>Người dùng</option>
                </select>
                @error('position')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Trạng thái tài khoản</label>
                <select class="form-control" id="is_active" name="is_active">
                    <option value="">--- chọn ---</option>
                    <option value="0" {!! $user->is_active == 0 ? 'selected' : false !!}>Vô hiệu hóa</option>
                    <option value="1" {!! $user->is_active == 1 ? 'selected' : false !!}>Kích hoạt</option>
                </select>

                @error('is_active')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="password">Mật Khẩu Mới</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu ...">
                @error('password')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Nhập lại mật khẩu ...">
                @error('password_confirmation')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</>
                    @enderror
            </div>

            @csrf

            <input type="submit" class="btn btn-success" name="submit" value="Áp dụng">
        </form>
    @else
        <h2>Người dùng không tồn tại</h2>
    @endif
@endsection
