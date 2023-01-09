@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@section('redirect')
    <a href="{{ route('admin.product.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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

    <div class="table-responsive p-4" style="background-color: #fff; border-radius: 5px">
        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: #C0C0C0; color: #333;">
                    <th class="align-middle text-center" scope="col">STT</th>
                    <th class="align-middle text-center" scope="col" width="100px">image</th>
                    <th class="align-middle text-center" scope="col">Tên sản phẩm</th>
                    <th class="align-middle text-center" scope="col">Giá nhập</th>
                    <th class="align-middle text-center" scope="col">Giá bán</th>
                    <th class="align-middle text-center" scope="col">Loại sản phẩm</th>
                    <th class="align-middle text-center" scope="col">Hãng sản phẩm</th>
                    <th class="align-middle text-center" scope="col" width="100px">Số lượng hàng</th>
                    <th class="align-middle text-center" scope="col" width="100px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->count() > 0)
                    @foreach ($products as $key => $product)
                        <tr>
                            <td class="align-middle text-center" scope="row">{{ $key + 1 }}</td>

                            <td>
                                <div class="" style="width: 100%;">
                                    <img src="{{ asset($product->avatar) }}" alt="" style="width: 100%;">
                                </div>
                            </td>

                            <td class="align-middle"><span>{{ $product->name }}</span></td>

                            <td class="align-middle">{{ $product->price }}đ</td>
                            <td class="align-middle">{!! empty($product->sale) ? $product->price : $product->sale !!}đ</td>
                            <td class="align-middle">{{ $product->category_id }}</td>
                            <td class="align-middle">{{ $product->brand->name }}</td>
                            <td class="align-middle">{!! $product->quantity > 0 ? $product->quantity : '<p class="mb-0" style="background-color: red; text-align: center; border-radius: 5px; color: #333; padding="3px 4px">Hết hàng</p>' !!}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.product.show', $product->id) }}" class="btn" style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="">
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
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
