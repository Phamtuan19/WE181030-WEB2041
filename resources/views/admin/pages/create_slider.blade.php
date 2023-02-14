@extends('admin.layout.index')

@section('page_heading', 'Slider trang bán hàng')

@section('redirect')
    <a href="{{ route('admin.slider') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-plus  text-white-50 pr-2" style="color: white !important"></i>
        Danh sách Slider
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

            <form action="{{ route('admin.slider.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group ">
                    <div class="my-2 box-reset_images">
                        <label for="images">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="images" name="images[]"
                            onchange="preview_images();" multiple />
                        <input onclick="return resetForm();" type="reset" class="btn btn-danger reset_images"
                            name='reset_images' value="Reset" />

                        @error('images')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mt-2" id="image_preview"></div>
                </div>

                <label for="">Trạng thái hình ảnh</label>
                <div class="form-group d-flex align-items-center mb-0">
                    <input type="radio" class="form-controll" id="is_active" name="is_active" value="1">
                    <label for="is_active" style="margin-bottom: 3.3px !important; margin-left: 6px">
                        Kích hoạt
                    </label>
                </div>

                <div class="form-group d-flex align-items-center">
                    <input type="radio" id="is_active_2" class="form-controll" id="is_active" name="is_active"
                        value="0">
                    <label for="is_active_2" style="margin-bottom: 3.3px !important; margin-left: 6px">
                        Vô hiệu hóa
                    </label>
                </div>


                <button type="submit" class="btn btn-primary">Thêm mới</button>

            </form>

        </div>
    </div>
</div>

@endsection


@section('js')
    <script>
        function preview_images() {
            resetForm()
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append(`
                  <div class='col-md-3'>
                      <img class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                  </div>`);
            }
        }

        function resetForm() {
            $("#image_preview").html("");
            return true;
        }
    </script>
@endsection
