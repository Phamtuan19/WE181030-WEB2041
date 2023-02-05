@extends('admin.layout.index')

@section('page_heading', 'Danh sách quản trị viên')

{{-- @section('redirect')
    <a href="{{ route('admin.users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Thêm người dùng mới
    </a>
@endsection --}}

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="" method="GET">
            <div class="row">
                <div class="col-lg-3 form-group">
                    <select name="is_active" id="" class="form-control">
                        <option value="">--- Tất cả trạng thái ---</option>
                        <option value="active">Kích hoạt</option>
                        <option value="disable">Vô hiệu hóa</option>
                    </select>
                </div>

                <div class="form-group col-6 d-flex px-0">
                    <input type="text" class="form-control" value="{{ request()->keywords }}" name="keywords"
                        placeholder="Nhập Tên, Tài khoản, Số điện thoại, Email ...">
                    <input type="submit" class="btn btn-primary ml-3" value="Tìm kiếm">
                </div>
            </div>
        </form>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>
                                <a href="?sort-by=username&sort-type={{ $sortType }}" class="right-left_a">
                                    Tài khoản đăng nhập
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th>
                                <a href="?sort-by=phone&sort-type={{ $sortType }}" class="right-left_a">
                                    Số điện thoại
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th>
                                <a href="?sort-by=Email&sort-type={{ $sortType }}" class="right-left_a">
                                    Email
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th>
                                <a href="?sort-by=position_id&sort-type={{ $sortType }}" class="right-left_a">
                                    Vị trí làm việc
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th>
                                <a href="?sort-by=is_active&sort-type={{ $sortType }}" class="right-left_a">
                                    Trạng thái tài khoản
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th>
                                <a href="?sort-by=created_at&sort-type={{ $sortType }}" class="right-left_a">
                                    Ngày tạo
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </th>
                            <th width="100px">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->position_id == 1 ? '<p class="text-danger">Administrator</p>' : '<p class="text-primary">Member</p>' !!}</td>
                                    <td>{!! $user->is_active == 1
                                        ? '<div class="btn btn-success">Kích hoạt</div>'
                                        : '<div class="btn btn-danger">Vô hiệu hóa</div>' !!}
                                    </td>
                                    <td>{{ date_format($user->created_at, 'H:i:s d-m-Y ') }}</td>
                                    <td class="">
                                        <div class="d-flex justify-content-around">
                                            <div class="">
                                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn"
                                                    style="color: black;">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                            @if ($user->position_id != 1)
                                                <div class="">
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button class="btn" style="border: none; ">
                                                            <i class="fa-solid fa-trash" style="color: red"></i>
                                                            <input type="submit" value="Xóa" class="d-none">
                                                        </button>

                                                    </form>
                                                </div>
                                            @else
                                                <div class="" style="width: 38px; height: 36px;"></div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" style="text-align: center; color: red;">Không có người dùng</td>
                            </tr>
                        @endif

                    </tbody>
                </table>

                {{-- {{ $users->links() }} --}}
            </div>
        </div>

    </div>
@endsection
