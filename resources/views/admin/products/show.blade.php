@extends('admin.layout.index')

@extends('admin.layout.model-confirm')

@section('page_heading')
    chỉnh sửa sản phẩm: #{{ $product->code }}
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_layout/css/product_create.css') }}">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách sản phẩm
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

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                @csrf

                @method('PATCH')

                <div class="col-lg-6">
                    <div class=" form-group">
                        <label for="category">Danh mục sản phẩm</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">--- Chọn danh mục ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category_id ? 'selected' : false }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group ">
                        <label for="brand">Thương hiệu sản phẩm</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">--- Chọn danh mục ---</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $brand->id == $product->brand_id ? 'selected' : false }}>{{ $brand->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('brand')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Màu sản phẩm</label>
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($colors as $value)
                                    <div class="form-check col-lg-3 mb-3">
                                        <input class="form-check-input" type="checkbox" name="color[]"
                                            value="{{ $value }}" id="check_color_{{ $value }}"
                                            {!! in_array($value, json_decode($product->attribute->color, true)) ? 'checked' : false !!}>
                                        <label class="form-check-label" for="check_color_{{ $value }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Bộ nhớ sản phẩm</label>
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($memory as $value)
                                    <div class="form-check col-lg-3 mb-3">
                                        <input class="form-check-input" type="checkbox" name="memory[]"
                                            value="{{ $value }}" id="check_memory_{{ $value }}"
                                            {!! in_array($value, json_decode($product->attribute->memory, true)) ? 'checked' : false !!}>
                                        <label class="form-check-label" for="check_memory_{{ $value }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="container-fluid">
                            <div class="row" style="margin-left: -1.5rem; margin-right: -1.5rem">
                                {{-- @dd($product->image) --}}
                                @foreach ($product->image as $item)
                                    <div class="col-lg-2 ">
                                        <img src="http://127.0.0.1:8000/{{ $item->image }}" alt=""
                                            style="width: 100%;">
                                        <i class="fa-regular fa-circle-xmark btn-delete"
                                            style="position: absolute; cursor: pointer; border: none;"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $item->id }}"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ empty(old('name')) ? $product->name : old('name') }}">

                        @error('name')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="input_quantity">Số lượng hàng nhập</label>
                        <input type="text" name="input_quantity" class="form-control" id="input_quantity"
                            value="{{ empty(old('input_quantity')) ? $product->input_quantity : old('input_quantity') }}">

                        @error('input_quantity')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="import_price">Giá Nhập</label>
                        <input type="text" name="import_price" class="form-control" id="import_price"
                            value="{{ empty(old('import_price')) ? $product->import_price : old('import_price') }}">

                        @error('import_price')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="price">Giá bán</label>
                        <input type="text" name="price" class="form-control" id="price"
                            value="{{ empty(old('price')) ? $product->price : old('price') }}">

                        @error('price')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="field form-group">
                        <label for="product_image">Thêm ảnh sản phẩm</label>
                        <input type="file" id="files_image" class="form-control" name="images[]" multiple
                            style="padding: 7.6px 12px" />
                        @error('product_image')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-lg-12 mb-3">
                    <label for="">Hình ảnh sản phẩm (Chọn ảnh đại diện / Xóa ảnh)</label>
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($product->image as $value)
                                <div class="col-lg-1 form-check">
                                    <img class="imageThumb" src="http://127.0.0.1:8000/{{ $value->image }}"
                                        alt="">
                                    <input class="form-check-input" type="radio" name="is_avarta"
                                        id="is_avatar_{{ $value->id }}" style="left: 50%;">
                                    <input class="form-check-input check_avatar" type="checkbox" name="remove_image[]"
                                        id="remove_image_{{ $value->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-12 form-group mt-4">
                    <label for="title">Thông tin sản phẩm</label>
                    <textarea name="title" id="title">
                        {{ empty(old('title')) ? $product->title : old('title') }}
                    </textarea>

                    @error('title')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-lg-12">
                    <label for="detail">Thông số kỹ thuật</label>
                    <textarea name="detail" id="detail">
                        {{ empty(old('detail')) ? $product->detail : old('detail') }}
                    </textarea>

                    @error('detail')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group ">
                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('title');
        CKEDITOR.replace('detail');

            $(document).ready(function() {
                $(".btn-delete").click(function() {
                    $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/delete/image/" + $(this).data("id"));
                    console.log($("#form-modal").attr('action'));
                })
            })
    </script>
@endsection
