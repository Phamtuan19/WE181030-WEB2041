@extends('admin.layout.index')

@section('page_heading', 'Thêm danh mục sản phẩm')

@section('link')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.category.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        Thêm danh mục
        <i class="fa-solid fa-right-long"></i>
    </a>
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: #C0C0C0; color: #333;">
                    <th scope="col" width="60px">STT</th>
                    <th scope="col" width="300px">Danh mục</th>
                    <th scope="col" width="300px">danh mục con</th>
                    <th scope="col" width="150px">Edit</th>
                    <th scope="col" width="150px">Delete</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if ($categories->count() > 0) --}}
                {{-- @dd( showCategories($categories)) --}}
                @foreach ($categories as $key => $category)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>

                        <td class="align-middle"><span>{{ $category['name'] }}</span></td>

                        @if ($category['children'])
                            <td class="align-middle" style="text-align: left !important; padding-left: 40px !important">
                                @foreach ($category['children'] as $children)
                                    <p>--- {{ $children['name'] }}</p>
                                @endforeach
                            </td>
                        @endif

                        {{-- <td>
                            <div class="d-flex justify-content-around">
                                <div class="">
                                    <a href="{{ route('admin.category.show', $category['id']) }}" class="btn"
                                        style="color: black;">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="remove">
                                <form action="{{ route('admin.category.destroy', $category['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn" style="border: none; ">
                                        <i class="fa-solid fa-trash" style="color: red"></i>
                                        <input type="submit" value="Xóa" class="d-none">
                                    </button>

                                </form>

                            </div>
                        </td> --}}
                    </tr>
                @endforeach
                {{-- @endif --}}

            </tbody>
        </table>
    </div>

@endsection
