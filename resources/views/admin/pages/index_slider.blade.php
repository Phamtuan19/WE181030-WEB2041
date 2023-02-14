@extends('admin.layout.index')

@section('page_heading', 'Slider trang bán hàng')

@section('redirect')
    <a href="{{ route('admin.slider.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-plus  text-white-50 pr-2" style="color: white !important"></i>
        Thêm ảnh slider
    </a>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="font-size: 14px;">
                        <thead>
                            <th width="5%">STT</th>
                            <td>Hình ảnh</td>
                            <td width="12%">
                                <a href="?sort-by=is_active&sort-type={{ $sortType }}" class="right-left_a">
                                    Trạng thái
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </td>
                            <td width="10%">
                                <a href="?sort-by=created_at&sort-type={{ $sortType }}" class="right-left_a">
                                    Ngày tạo
                                    <i class="fa-solid fa-right-left right-left"></i>
                                </a>
                            </td>
                            <td width="10%">Edit</td>
                            <td width="10%">Remove</td>
                        </thead>

                        <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>
                                        <img src="{{ $slider->image_path }}" alt=""
                                            style="width: 100%; height: 152px;">
                                    </td>
                                    <td>
                                        {!! $slider->is_active != null
                                            ? '<span class="btn btn-primary">Kích hoạt</span>'
                                            : '<span class="btn btn-danger">Vô hiệu hóa</span>' !!}

                                    </td>
                                    <td>{{ date_format($slider->created_at, 'd-m-Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <div class="">
                                                <a href="{{ route('admin.slider.show', $slider->id) }}" class="btn"
                                                    style="color: black;">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-delete" style="border: none; " id="btn"
                                            style="border: none; " data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $slider->id }}">
                                            <i class="fa-solid fa-trash" style="color: red"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="" style="float: right;">
                    {{ $sliders->appends(request()->all())->links() }}
                </div>
            </div>

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
                        Xóa hình ảnh sẽ ảnh hướng tới dữ liệu !
                        <br>
                        Bạn chắc chắn muốn xóa ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                    <form id="form-modal" action="" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-success">Xác nhận</button>
                        <input type="text" name="deleted_at" value="Xóa" hidden>
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
                console.log(window.location.href);

                $("#form-modal").attr('action', window.location.href + '/delete/' + $(this)
                    .data("id"));
                console.log($("#form-modal").attr('action'));
            })

            // $(".restore").click(function() {
            //     $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/product/softErase/" + $(this)
            //         .data("id"));
            //     console.log($("#form-modal").attr('action'));
            // })
        })
    </script>
@endsection
