@extends('admin.layout.index')

@section('page_heading', 'Thêm quản trị viên')

@section('redirect')
    <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Danh sách quản trị viên
    </a>
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif
    <form action="{{ route('admin.users.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="username">Tài khoản đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username"
                placeholder="Nhập tài khoản đăng nhập">
            @error('username')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email ...">
            @error('email')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại ...">
            @error('phone')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="position">Quyền</label>
            <select class="form-control" id="position" name="position">
                <option value="">--- chọn ---</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            @error('position')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu ...">
            @error('password')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Nhập lại mật khẩu ...">
            @error('password_confirmation')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</>
                @enderror
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Đăng ký mới">
        </div>
    </form>
@endsection
