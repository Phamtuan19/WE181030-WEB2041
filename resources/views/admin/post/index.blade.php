@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@section('redirect')
    @can('create', App\Models\Post::class)
        <a href="{{ route('admin.posts.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus  text-white-50 pr-2" style="color: white !important"></i>
            Thêm sản phẩm
        </a>
    @endcan
@endsection

@section('content')

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">

        {{-- <div class="container-fluid">
            <form action="">
                <div class="row" style="margin: 0 -1.5rem">
                    <div class="col-lg-2 form-group mt-1">
                        <select name="category" id="" class="form-control">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($subcategory as $category)
                                <option value="{{ $category->slug }}" {!! request()->category == $category->slug ? 'selected' : false !!}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 form-group mt-1">
                        <select name="post" id="" class="form-control">
                            <option value="">Tất cả các hãng</option>
                            @foreach ($posts as $post)
                                <option value="{{ $post->name }}" {!! request()->post === $post->name ? 'selected' : false !!}>{{ $post->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 form-group mt-1">
                        <input type="text" class="form-control" name="keyword" value="{{ request()->keyword }}"
                            placeholder="Nhập từ khóa tìm kiếm ...">
                    </div>

                    <div class="form-group mt-1">
                        <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                    </div>
                </div>
            </form>
        </div> --}}

        <table class="table table-bordered" id="" width="100%" style="font-size: 14px;">
            <thead>
                <tr style="background-color: ; color: #333;">
                    <th scope="col" width="5%">STT</th>
                    <th scope="col" width="10%">Hình ảnh</th>
                    <th scope="col" width="25%">
                        <a href="?sort-by=name&sort-type=" class="right-left_a">
                            Tiêu đề bài viết
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col" width="15%">
                        <a href="?sort-by=import_price&sort-type=" class="right-left_a">
                            Slug
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col" width="20%">
                        <a href="?sort-by=import_price&sort-type=" class="right-left_a">
                            Danh mục
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th width="5%">Nội dung</th>
                    <th scope="col" width="10%">
                        <a href="?sort-by=price&sort-type=" class="right-left_a">
                            Người tạo
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col" width="10%">
                        <a href="?sort-by=created_at&sort-type=" class="right-left_a">
                            Ngày tạo
                            <i class="fa-solid fa-right-left right-left"></i>
                        </a>
                    </th>
                    <th scope="col" width="5%">Edit</th>
                    <th scope="col" width="5%">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                    @foreach ($posts as $key => $post)
                        <tr style="text-align: center">
                            <td class="align-middle text-center" scope="row">{{ $key + 1 }}</td>

                            <td>
                                <div class="" style="width: 100%;">
                                    @if ($post->avatar_path != null)
                                        <img src="{{ $post->avatar_path }}" alt="" style="width: 100%;">
                                    @endif
                                </div>
                            </td>

                            <td><span>{{ $post->title }}</span></td>

                            <td>
                                {{ $post->slug }}
                            </td>

                            <td>
                                @foreach (json_decode($post->category_id, true) as $value)
                                    @foreach ($categories as $category)
                                        @if ($category->id == $value)
                                            <button class="btn-primary mb-1" style="border: none; border-radius: 10px">
                                                {{-- {{ json_decode($post->category_id, true)[0]->categoty->name }} --}}
                                                {{ $category->name }}
                                            </button>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>


                            <td>
                                <a href="{{ route('admin.postContent', $post) }}">
                                    <i class="fa-solid fa-eye" style="font-size: 24px;"></i>
                                </a>
                            </td>


                            <td>{{ $post->user->username }}</td>

                            <td>{{ date_format($post->created_at, 'H:i:s d-m-Y') }}</td>

                            <td>
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        @can('posts.edit')
                                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn"
                                                style="color: black;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        @can('posts.delete')
                                            <button type="submit" class="btn btn-delete" id="btn" style="border: none; "
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-id="{{ $post->id }}">
                                                <i class="fa-solid fa-trash" style="color: red"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="10">
                        <h3>Không có bài viết nào</h3>
                    </td>
                @endif

            </tbody>
        </table>

        <div class="" style="float: right;">
            {{ $posts->appends(request()->all())->links() }}
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: red">Cảnh Báo</h5>
                    <button type="button" class="btn-close" style="border: none; background-color: #fff"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </button>
                </div>
                <div class="modal-body content-modal">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p class="content-modal_title">
                        Xóa sản bài viết sẽ ảnh hướng tới dữ liệu !
                        <br>
                        Bạn chắc chắn muốn xóa ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                    <form id="form-modal" action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Xác nhận</button>
                        <input type="text" name="deleted_at" value="xóa mềm" hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".btn-delete").click(function() {
                $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/post/softErase/" + $(this)
                    .data("id"));
                console.log($("#form-modal").attr('action'));
            })
        });
    </script>
@endsection
