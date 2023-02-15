@extends('admin.layout.index')

@section('page_heading')
    chỉnh sửa sản phẩm: #{{ $product->code }}
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/products/css/show.css') }}">
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

    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
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
                                @if ($product->attribute->color == 'null')
                                    @foreach ($colors as $value)
                                        <div class="form-check col-lg-3 mb-3">
                                            <input class="form-check-input" type="checkbox" name="color[]"
                                                value="{{ $value }}" id="check_color_{{ $value }}"
                                                style="margin-top: -0.6rem !important">
                                            <label class="form-check-label" for="check_color_{{ $value }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($colors as $value)
                                        <div class="form-check col-lg-3 mb-3">
                                            <input class="form-check-input" type="checkbox" name="color[]"
                                                value="{{ $value }}" id="check_color_{{ $value }}"
                                                {!! in_array($value, json_decode($product->attribute->color, true)) ? 'checked' : false !!} style="margin-top: -0.6rem !important">
                                            <label class="form-check-label" for="check_color_{{ $value }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- @dd($memory) --}}
                    <div class="form-group">
                        <label for="">Bộ nhớ sản phẩm</label>
                        <div class="container-fluid">
                            <div class="row">
                                @if (json_decode($product->attribute->memory, true) == null)
                                    @foreach ($memory as $value)
                                        <div class="form-check col-lg-3 mb-3">
                                            <input class="form-check-input" type="checkbox" name="memory[]"
                                                value="{{ $value }}" id="check_memory_{{ $value }}"
                                                style="margin-top: -0.6rem !important">

                                            <label class="form-check-label" for="check_memory_{{ $value }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($memory as $value)
                                        <div class="form-check col-lg-3 mb-3">
                                            <input class="form-check-input" type="checkbox" name="memory[]"
                                                value="{{ $value }}" id="check_memory_{{ $value }}"
                                                {!! in_array($value, json_decode($product->attribute->memory, true)) ? 'checked' : false !!} style="margin-top: -0.6rem !important">

                                            <label class="form-check-label" for="check_memory_{{ $value }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="container-fluid">
                            <div class="row" style="margin-left: -1.5rem; margin-right: -1.5rem">
                                <label for="" class="col-lg-12 mb-3" style="padding: 0 0;">Danh sách hình
                                    ảnh</label>
                                @foreach ($product->image as $item)
                                    <div class="col-lg-2 ">
                                        <img src="{{ $item->path }}" alt="" style="width: 100%;">

                                        @if ($item->is_avatar == 1)
                                            <i class="fa-solid fa-check icon_avatar"></i>
                                        @endif

                                        <div class="edit_image">
                                            <i class="fa-regular fa-pen-to-square icon_edit" data-id="{{ $item->id }}">
                                            </i>

                                            <div class="image_edit " style="">
                                                <p class="mb-0 choose_avatar" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-id="{{ $item->id }}">Avatar</p>
                                                <p class="mb-1 Change_image" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-id="{{ $item->id }}">Change</p>
                                                <p class="mb-1 delete_image" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-id="{{ $item->id }}">Delete
                                                </p>
                                            </div>
                                        </div>
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

                    <div class="form-group">
                        <label for="promotion_price">Giá khuyến mãi</label>
                        <input type="text" name="promotion_price" class="form-control" id="promotion_price"
                            value="{{ empty(old('promotion_price')) ? $product->promotion_price : old('promotion_price') }}">

                        @error('promotion_price')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group ">
                        <div class="my-2 box-reset_images">
                            <label for="images">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="images" name="images[]"
                                onchange="preview_images();" multiple />
                            <input onclick="return resetForm();" type="reset" class="btn btn-danger reset_images"
                                name='reset_images' value="Reset" />

                            @error('images')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mt-2" id="image_preview"></div>
                    </div>
                </div>

                <div class="col-lg-12 form-group mt-4">
                    <label for="title">Thông tin sản phẩm</label>
                    <textarea name="title" id="ck-title">
                        {{ empty(old('title')) ? $product->information : old('title') }}
                    </textarea>

                    @error('title')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-lg-12">
                    <label for="detail">Thông số kỹ thuật</label>
                    <textarea name="detail" id="ck-detail">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-modal" class="form_edit_img" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" class="form-method" value="">
                <div class="modal-content">

                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('admin/custom_admin/products/js/show.js') }}"></script>
@endsection
