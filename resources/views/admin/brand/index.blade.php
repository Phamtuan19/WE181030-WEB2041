@extends('admin.layout.index')

@section('page_heading', 'Danh sách Thương hiệu')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.brand.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        Thêm thương hiệu
        <i class="fa-solid fa-right-long mx-2"></i>
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

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <form action="" method="GET">
        <div class="row">

            <div class="form-group col-6 d-flex px-0 mx-3" style="">
                <input type="text" class="form-control" value="{{ request()->keywords }}" name="keywords"
                    placeholder="Nhập Tên thươn hiệu ...">
                <input type="submit" class="btn btn-primary ml-3" value="Tìm kiếm">
            </div>
        </div>
    </form>


    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: #C0C0C0; color: #333;">
                    <th class="align-middle text-center" scope="col" width="100px">STT</th>
                    <th class="align-middle text-center" scope="col" width="150px">Ảnh đại diện</th>
                    <th class="align-middle text-center" scope="col" width="20%">
                        <a href="?sort-by=name&sort-type={{ $sortType }}" class="right-left_a">
                            Tên Thương hiệu
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th class="align-middle text-center" scope="col" width="30%">
                        Loại sản phẩm
                    </th>
                    <th class="align-middle text-center" scope="col" width="10%">
                        <a href="?sort-by=created_at&sort-type={{ $sortType }}" class="right-left_a">
                            Ngày tạo
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    @can('brands.edit')
                        <th class="align-middle text-center" scope="col" width="50px">Edit</th>
                    @endcan
                    @can('brands.delete')
                        <th class="align-middle text-center" scope="col" width="50px">Remove</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @if (count($brands) > 0)
                    @foreach ($brands as $key => $brand)
                        <tr style="text-align: center; vertical-align: middle;">
                            <td scope="row">{{ $key + 1 }}</td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    {{-- @dd($brand['path_image']) --}}
                                    @if (!empty($brand['path_image']))
                                        <img src="{{ $brand['path_image'] }}" alt=""
                                            style="width: 50px; height: 50px;">
                                    @endif
                                </div>
                            </td>

                            <td><span>{{ $brand['name'] }}</span></td>

                            {{-- @dd(!empty($brand->category_id)); --}}
                            <td>
                                @if (!empty($brand->category_id) && !empty($categories->count() > 0))
                                    <div class="row">
                                        @foreach ($categories as $item)
                                            {{-- @dd($item) --}}
                                            @if (in_array($item->id, json_decode($brand->category_id, true)))
                                                <div class="col-lg-6 mb-1">
                                                    <span class="btn btn-primary">{{ $item->name }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </td>

                            <td>
                                @if (!empty($brand->created_at))
                                    {{ date_format($brand->created_at, 'd-m-Y') }}
                                @endif
                            </td>

                            @can('brands.edit')
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <a href="{{ route('admin.brand.show', $brand['id']) }}" class="btn"
                                                style="color: black;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('brands.delete')
                                <td>
                                    <div>
                                        <form action="{{ route('admin.brand.destroy', $brand['id']) }}" method="POST">
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

        <div class="" style="float: right;">
            {{ $brands->appends(request()->all())->links() }}
        </div>
    </div>

@endsection
