@extends('admin.layout.index')

@section('page_heading', 'Thêm bài viết')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/posts/css/create.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />


@endsection

@section('content')
    <div class="container-fluid">

        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="title" class="form-label">Tiêu đề bài viết</label>
                        <textarea class="form-control" id="title" rows="3" name="title">{{ old('title') }}</textarea>
                        @error('title')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Chọn sản phẩm</label>
                        <select class="select2 form-control" name="product_code[]" style="height: 42px !important;"  multiple="multiple">
                            <option value="">--- Chọn sản phẩm ---</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->code }}" {!! old('product_code') == $product->code ? 'selected' : false !!}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_code')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Nội dung bài viết</label>
                        <br>
                        @error('content')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                        <textarea class="form-control" id="ck-content_post" name="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="col-lg-3" style="">

                    <div class="form-group">
                        <label for="">Slug bài viết</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ old('slug') }}" style="background-color: #FFF">
                        @error('slug')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Danh mục bài viết</label>
                        <select id="" class="form-control select2_category" name="category_id[]" multiple="multiple">
                            <option value="">--- Chọn danh mục ---</option>
                            {{ showCategories($categories) }}
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {!! old('category_id') == $category->id ? 'selected' : false !!}>{{ $category->name }}</option>
                            @endforeach --}}
                        </select>
                        @error('category_id')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Thêm hình ảnh đại điện</label>
                        <label class="picture" for="picture__input" tabIndex="0">
                            <span class="picture__image"></span>
                        </label>

                        <input type="file" name="post_avatar" id="picture__input">
                        @error('post_avatar')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Đăng bài">
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js')

    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="{{ asset('admin/custom_admin/posts/js/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#title").keyup(function() {
                $("#slug").val(renSlug($(this).val()))
            });

            $("#slug").val(renSlug($("#title").val()))

            $(".select2").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })

            $(".select2_category").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })
        });
    </script>
@endsection
