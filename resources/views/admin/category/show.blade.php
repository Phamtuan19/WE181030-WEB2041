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
            @csrf
            @method('PATCH');

            <div class="container-fluid">
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" id="title"
                            value="{{ empty(old('name')) ? $category->name : old('name')  }}">
                        @error('name')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug"
                            value="{{ !empty(old('slug')) ? $category->slug : old('slug') }}">
                        @error('slug')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="category_id">Danh mục cha</label>
                        <select name="category_id" id="category_id" class="form-control">
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
    @endif
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
