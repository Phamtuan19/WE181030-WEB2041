@extends('admin.layout.index')

@section('page_heading', 'Chỉnh sửa danh mục')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.category.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách danh mục
    </a>
@endsection

@section('content')

    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    @if (!empty($category))
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ empty(old('name')) ? $category->name : old('name') }}">

                @error('name')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="type">Loại danh mục</label>
                <select name="type" id="type" class="form-control">
                    <option value="">--- Chọn danh mục ---</option>
                    <option value="1" {{ $category->type == 1 ? 'selected' : false }}>Sản phẩm</option>
                    <option value="2" {{ $category->type == 2 ? 'selected' : false }}>Bài viết</option>
                </select>

                @error('type')
                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Thêm mới">
            </div>
        </form>
    @else
        Danh mục không tồn tại
    @endif

@endsection
