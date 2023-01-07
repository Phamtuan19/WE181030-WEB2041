@extends('admin.layout.index')

@section('page_heading', 'Thêm danh mục sản phẩm')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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

    <div class="p-4" style="background-color: #fff; border-radius: 5px">
        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên thương hiệu</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">

                @error('name')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại Thương hiệu</label>
                <input type="file" name="avatar[]" class="form-control" id="avatar" style="padding: 3px 12px">

                @error('avatar')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Thêm mới">
            </div>
        </form>
    </div>
@endsection


