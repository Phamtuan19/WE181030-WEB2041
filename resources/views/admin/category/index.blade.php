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
                    <th class="align-middle text-center" scope="col">STT</th>
                    <th class="align-middle text-center" scope="col">Danh mục cha</th>
                    <th class="align-middle text-center" scope="col" width="100px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->count() > 0)
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td class="align-middle text-center" scope="row">{{ $key + 1 }}</td>

                            <td class="align-middle"><span>{{ $category->name }}</span></td>

                            <td>
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <a href="{{ route('admin.category.show', $category->id) }}" class="btn" style="color: black;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="remove">
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn" style="border: none; ">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                                <input type="submit" value="Xóa" class="d-none">
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

@endsection


