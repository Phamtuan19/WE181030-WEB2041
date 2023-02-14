@extends('admin.layout.index')

@section('page_heading', 'Thêm danh Thương hiệu')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('redirect')
    <a href="{{ route('admin.brand.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách thương hiệu
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

    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên thương hiệu</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">

            @error('name')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror

        </div>
        {{-- @dd($categories) --}}
        <div class="form-group">
            <label for="">Loại sản phẩm</label>
            <select class="select2_category form-control" name="categories[]" style="height: 42px !important;" multiple="multiple">
                <option value="">--- Chọn sản phẩm ---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {!! old('categories') == $category->id ? 'selected' : false !!}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="image">Ảnh đại Thương hiệu</label>
            <input type="file" name="image" class="form-control" id="image" style="padding: 3px 12px">

            @error('avatar')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Thêm mới">
        </div>
    </form>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".select2_category").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })
        });
    </script>
@endsection
