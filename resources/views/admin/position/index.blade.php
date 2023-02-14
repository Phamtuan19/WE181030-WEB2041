@extends('admin.layout.index')

@section('page_heading', 'Danh sách Thương hiệu')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    @can('positions', App\Models\Position::class)
        <a href="{{ route('admin.positions.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Thêm quyền
            <i class="fa-solid fa-right-long mx-2"></i>
        </a>
    @endcan
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: #C0C0C0; color: #333;">
                    <th class="align-middle text-center" scope="col" width="100px">STT</th>
                    <th class="align-middle text-center" scope="col">Tên quyền</th>
                    <th class="align-middle text-center" scope="col" width="300px">Quyền truy cập</th>
                    @can('positions.edit')
                        <th class="align-middle text-center" scope="col" width="200px">Edit</th>
                    @endcan
                    @can('positions.delete')
                        <th class="align-middle text-center" scope="col" width="200px">Remove</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @if ($positions->count() > 0)
                    @foreach ($positions as $key => $position)
                        <tr style="text-align: center; vertical-align: middle;">
                            <td scope="row">{{ $key + 1 }}</td>

                            <td>{{ $position->name }}</td>
                            <td><a href="{{ route('admin.permission', $position->id) }}" class="btn btn-primary">Phân quyền</a></td>

                            @can('positions.edit')
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <a href="{{ route('admin.positions.show', $position->id) }}" class="btn"
                                                style="color: black;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('positions.delete')
                                <td>
                                    <div>
                                        <form action="{{ route('admin.positions.destroy', $position->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn" style="border: none; ">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                                <input type="submit" value="Xóa" class="d-none">
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <td colspan="5">
                        <h3>Không có thương hiệu sản phẩm</h3>
                    </td>
                @endif

            </tbody>
        </table>
    </div>

@endsection
