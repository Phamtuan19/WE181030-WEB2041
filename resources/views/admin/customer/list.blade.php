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

    <form action="" method="GET">
        <div class="d-flex ">
            <div class="form-group">
                <label for=""></label>
            </div>

            <div class="form-group col-6 d-flex px-0">
                <input type="text" class="form-control" value="{{ request()->keywords }}" name="keywords"
                    placeholder="Nhập Tên, Tài khoản, Số điện thoại, Email ...">
                <input type="submit" class="btn btn-primary ml-3" value="Tìm kiếm">
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    {{-- <th>Tài khoản đăng nhập</th> --}}
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Vị trí làm việc</th>
                    <th>Trạng thái tài khoản</th>
                    <th width="100px">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @if ($customers->count() > 0)
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $customer->full_name }}</td>
                            {{-- <td>{{ $customer->username }}</td> --}}
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{!! $customer->position_id == 1 ? '<p class="text-danger">Administrator</p>' : '<p class="text-primary">Member</p>' !!}</td>
                            <td>{!! $customer->is_active == 1
                                ? '<div class="btn btn-success">Kích hoạt</div>'
                                : '<div class="btn btn-danger">Vô hiệu hóa</div>' !!}</td>
                            <td class="" >
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.users.show', $customer->id) }}" class="btn"
                                            style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    @if ($customer->position_id != 1)
                                        <div class="">
                                            <form action="{{ route('admin.users.destroy', $customer->id) }}" method="POST">
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
@endsection
