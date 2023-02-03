@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@extends('admin.layout.model-confirm')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/modal-confirm.css') }}">
@endsection

@section('redirect')
    <a href="{{ route('admin.products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-plus  text-white-50 pr-2" style="color: white !important"></i>
        Thêm sản phẩm
    </a>
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">

        <form action="">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-2 form-group mt-1">
                        <select name="category" id="" class="form-control">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}" {!! request()->category === $category->slug ? 'selected' : false !!}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 form-group mt-1">
                        <select name="brand" id="" class="form-control">
                            <option value="">Tất cả các hãng</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->slug }}" {!! request()->brand === $brand->slug ? 'selected' : false !!}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 form-group mt-1">
                        <input type="text" class="form-control" name="keyword" value="{{ request()->keyword }}"
                            placeholder="Nhập từ khóa tìm kiếm ...">
                    </div>

                    <div class="form-group mt-1">
                        <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                    </div>

                </div>
            </div>
        </form>

        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: ; color: #333;">
                    <th scope="col" style="text-align: left !important;">STT</th>
                    <th scope="col" width="100px">image</th>
                    <th scope="col">
                        <a href="?sort-by=name&sort-type={{$sortType}}" class="right-left_a">
                            Tên sản phẩm
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="?sort-by=import_price&sort-type={{$sortType}}" class="right-left_a">
                            Giá nhập
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="?sort-by=price&sort-type={{$sortType}}" class="right-left_a">
                            Giá bán
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Hãng sản phẩm</th>
                    <th scope="col" width="120px">
                        <a href="?sort-by=input_quantity&sort-type={{$sortType}}" class="right-left_a">
                            Số lượng
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="?sort-by=created_at&sort-type={{$sortType}}" class="right-left_a">
                            ngày nhập
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col" width="100px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->count() > 0)
                    @foreach ($products as $key => $product)
                        <tr style="text-align: center">
                            <td class="align-middle text-center" scope="row">{{ $key + 1 }}</td>

                            <td>
                                <div class="" style="width: 100%;">
                                    <img src="{{ asset($product->image[0]->image) }}" alt="" style="width: 100%;">
                                    {{-- @dd($product->image[0]->image) --}}
                                </div>
                            </td>

                            <td><span>{{ $product->name }}</span></td>

                            <td>{{ $product->price }}đ</td>
                            <td>{!! empty($product->sale) ? $product->price : $product->sale !!}đ</td>
                            <td>{{ $product->cartegory->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{!! $product->quantity_stock > 0
                                ? $product->quantity_stock . '(Chiếc)'
                                : '<p class="mb-0" style="background-color: red; text-align: center; border-radius: 5px; color: #333; padding="3px 4px">Hết hàng</p>' !!}</td>
                            <td>{{ date_format($product->created_at, 'd-m-Y') }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn"
                                            style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="">
                                        {{-- <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf --}}

                                            <button type="submit" class="btn btn-delete" id="btn" style="border: none; " data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $product->id }}">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                            </button>

                                        {{-- </form> --}}

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

        {{-- {!! $products->appends(['category' => request()->category, 'brand' => request()->brand, 'keyword' => request()->keyword])->links() !!} --}}
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(".btn-delete").click(function () {
                $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/products/" + $(this).data("id"));
                console.log($("#form-modal").attr('action'));
            })
        })
    </script>
@endsection
