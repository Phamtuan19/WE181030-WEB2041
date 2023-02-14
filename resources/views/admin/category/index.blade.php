@extends('admin.layout.index')

@section('page_heading', 'Thêm danh mục sản phẩm')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    @can('categories.add', App\Models\Categories::class)
        <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Thêm danh mục
            <i class="fa-solid fa-right-long"></i>
        </a>
    @endcan
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    @if (!empty($categories))
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
                <thead>
                    <tr style="background-color: #C0C0C0; color: #333;">
                        <th scope="col" width="60px">STT</th>
                        <th scope="col" width="300px">Danh mục</th>
                        <th scope="col" width="300px">Slug</th>
                        <th scope="col" width="10%">Thời gian tạo</th>
                        @can('categories.edit')
                            <th scope="col" width="10%">Edit</th>
                        @endcan
                        @can('categories.delete')
                            <th scope="col" width="10%">Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($categories->count() > 0) --}}
                    {{-- @dd( showCategories($categories)) --}}
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>

                            @if ($category->parent_id != null)
                                <td style="text-align: left !important; padding-left: 100px"><span>---
                                        {{ $category->name }}</span></td>
                            @else
                                <td style="text-align: left !important; padding-left: 100px">
                                    <span>{{ $category->name }}</span>
                                </td>
                            @endif

                            <td>{{ $category->slug }}</td>

                            <td>
                                @if (!empty($category->created_at))
                                    {{ date_format($category->created_at, 'd-m-Y') }}
                                @endif
                            </td>

                            @can('categories.edit')
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div class="">
                                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn"
                                                style="color: black;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            @endcan

                            @can('categories.delete')
                                <td style="">
                                    <div class="remove">
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn" style="border: none; padding: 18px 55px;">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                                <input type="submit" value="Xóa" class="d-none">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    {{-- @endif --}}

                </tbody>
            </table>
        </div>
    @else
        <h1>Không có danh mục nào</h1>
    @endif

@endsection
