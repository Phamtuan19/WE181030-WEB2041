@extends('admin.layout.index')

@section('page_heading', 'Chỉnh sửa Thương hiệu')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
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

    @if (!empty($brand))
        <div class="">
            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ empty(old('name')) ? $brand->name : old('name') }}">

                    @error('name')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="">Loại sản phẩm</label>
                    {{-- @dd(json_decode($brand->category_id, true)); --}}
                    <select class="select2_category form-control" name="categories[]" style="height: 42px !important;"
                        multiple="multiple">
                        <option value="">--- Chọn sản phẩm ---</option>
                        @if (!empty(json_decode($brand->category_id, true)))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, json_decode($brand->category_id, true)) ? 'selected' : false }}>{{ $category->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('categories')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Ảnh đại Thương hiệu</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" style="padding: 3px 12px">

                    @error('avatar')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Áp dụng">
                    <a href="{{ route('admin.brand.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    @else
        Danh mục không tồn tại
    @endif

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
