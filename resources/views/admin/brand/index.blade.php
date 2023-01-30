@extends('admin.layout.index')

@section('page_heading', 'Danh sách Thương hiệu')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.brand.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Thêm thương hiệu
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

    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: #C0C0C0; color: #333;">
                    <th class="align-middle text-center" scope="col" width="100px">STT</th>
                    <th class="align-middle text-center" scope="col" width="150px">Ảnh đại diện</th>
                    <th class="align-middle text-center" scope="col" >Tên danh mục</th>
                    <th class="align-middle text-center" scope="col" width="100px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @if ($brands->count() > 0)
                    @foreach ($brands as $key => $brand)
                        <tr>
                            <td class="align-middle text-center" scope="row">{{ $key + 1 }}</td>

                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    @if (!empty($brand->brand_image))
                                        {{-- @dd(json_decode($product->images, true)) --}}
                                        <img src="{{ asset($brand->brand_image) }}" alt=""
                                            style="width: 50px; height: 50px;">
                                    @endif
                                </div>
                            </td>

                            <td class="align-middle"><span>{{ $brand->name }}</span></td>

                            <td>
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.brand.show', $brand->id) }}" class="btn" style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="">
                                        <form action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn" style="border: none; ">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                                <input type="submit" value="Xóa" class="d-none">
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

@endsection


