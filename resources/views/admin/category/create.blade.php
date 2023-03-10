@extends('admin.layout.index')

@section('page_heading', 'Thêm danh mục sản phẩm')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.brand.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách danh mục
    </a>
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">

                <div class="form-group col-lg-6">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" id="title" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-6">
                    <label for="name">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
                    @error('slug')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-6">
                    <label for="parent_id">Danh mục cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">--- Không ---</option>
                        {{ showCategories($categories) }}
                    </select>

                    @error('type')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm mới">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#title").keyup(function() {
                $("#slug").val(renSlug($(this).val()))
            });

            $("#slug").val(renSlug($("#title").val()))
        });
    </script>
@endsection
