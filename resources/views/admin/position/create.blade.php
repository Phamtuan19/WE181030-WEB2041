@extends('admin.layout.index')

@section('page_heading', 'Thêm danh Thương hiệu')

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

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <form action="{{ route('admin.positions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Tên quyền</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">

            @error('name')
                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Thêm mới">
        </div>
    </form>
@endsection
