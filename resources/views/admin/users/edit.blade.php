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
        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
    @endif
    @if (!empty($user))

        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif

        <div class="container-fluid">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @method('PATCH')

                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="username">Tài khoản đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{!! empty(old('username')) ? $user->username : old('username') !!}" placeholder="Nhập tài khoản đăng nhập">
                        @error('username')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{!! empty(old('email')) ? $user->email : old('email') !!}" placeholder="Nhập địa chỉ email ...">
                        @error('email')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{!! empty(old('phone')) ? $user->phone : old('phone') !!}" placeholder="Nhập số điện thoại ...">
                        @error('phone')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 form-group">
                        <label for="position">Quyền</label>
                        <select class="form-control" id="role" name="position">
                            <option value="">--- chọn ---</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {!! $user->position_id == $position->id ? 'selected' : false !!}>{{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 form-group">
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

                    <div class="col-lg-6 form-group">
                        <label for="password">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Nhập mật khẩu ...">
                        @error('password')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="col-lg-6 form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Nhập lại mật khẩu ...">
                        @error('password_confirmation')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</>
                            @enderror
                    </div> --}}

                    @csrf


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
                                {{-- <form id="form-modal" action="" method="POST"> --}}
                                {{-- @method('DELETE') --}}
                                {{-- @csrf --}}
                                <button type="none" class="btn btn-success">Xác nhận</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <button class="btn btn-success mb-3 ml-3 btn-submit" name="submit" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Áp dụng</button>
        </div>
    @else
        <h2>Người dùng không tồn tại</h2>
    @endif
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
