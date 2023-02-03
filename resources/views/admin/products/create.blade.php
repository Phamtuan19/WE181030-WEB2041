@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_layout/css/product_create.css') }}">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('redirect')
    <a href="{{ route('admin.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-2"></i>
        Danh sách sản phẩm
    </a>
@endsection

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                @csrf

                <div class="col-lg-6">
                    <div class=" form-group">
                        <label for="category">Danh mục sản phẩm</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">--- Chọn danh mục ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group ">
                        <label for="brand">Thương hiệu sản phẩm</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">--- Chọn danh mục ---</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                        @error('brand')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Màu sản phẩm</label>
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($colors as $index => $color)
                                    <div class="form-check col-lg-3 mb-3">
                                        <input class="form-check-input" type="checkbox" name="color[]"
                                            value="{{ $index }}" id="check_color_{{ $index }}">
                                        <label class="form-check-label" for="check_color_{{ $index }}">
                                            {{ $index }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Bộ nhớ sản phẩm</label>
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($memory as $value)
                                    <div class="form-check col-lg-3 mb-3">
                                        <input class="form-check-input" type="checkbox" name="memory[]"
                                            value="{{ $value }}" id="check_memory_{{ $value }}">
                                        <label class="form-check-label" for="check_memory_{{ $value }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="input_quantity">Số lượng</label>
                        <input type="text" name="input_quantity" class="form-control" id="input_quantity"
                            value="{{ old('input_quantity') }}">

                        @error('input_quantity')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="import_price">Giá sản phẩm</label>
                        <input type="text" name="import_price" class="form-control" id="import_price"
                            value="{{ old('import_price') }}">

                        @error('import_price')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="price">Giá khuyến mãi</label>
                        <input type="text" name="price" class="form-control" id="price"
                            value="{{ old('price') }}">

                        @error('price')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="field form-group">
                        <label for="product_image">Ảnh sản phẩm</label>
                        <input type="file" id="files_image" class="form-control" name="images[]" multiple
                            style="padding: 7.6px 12px" />
                        @error('product_image')
                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-lg-12 form-group">
                    <label for="title">Thông tin sản phẩm</label>
                    <textarea name="title" id="title">

                    </textarea>

                    @error('title')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-lg-12">
                    <label for="detail">Thông số kỹ thuật</label>
                    <textarea name="detail" id="detail">
                        {{-- {{ old('detail') }} --}}
                        <table border="0" cellpadding="0" style="width:100%">
                            <tbody>
                                <tr>
                                    <td>Thẻ SIM:</td>
                                    <td>Nano + eSim</td>
                                </tr>
                                <tr>
                                    <td>Kiểu thiết kế:</td>
                                    <td>2 mặt k&iacute;nh, khung th&eacute;p</td>
                                </tr>
                                <tr>
                                    <td>M&agrave;n h&igrave;nh:</td>
                                    <td>
                                    <p>6.7&nbsp;inches,&nbsp;LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 2000 nits</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Độ ph&acirc;n giải:</td>
                                    <td>1290 x 2796 pixels, tỷ lệ 19.5:9</td>
                                </tr>
                                <tr>
                                    <td>CPU:</td>
                                    <td>
                                    <p>Apple A16&nbsp;Bionic (4&nbsp;nm)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>RAM:</td>
                                    <td>6GB</td>
                                </tr>
                                <tr>
                                    <td>Bộ nhớ/ Thẻ nhớ:</td>
                                    <td>128/256/512GB/1TB</td>
                                </tr>
                                <tr>
                                    <td>Camera sau:</td>
                                    <td>
                                    <p>48 MP, f/1.8, 24mm (wide), 12 MP, 12 MP</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera trước:</td>
                                    <td>
                                    <p>12 MP, f/1.9, 23mm (wide)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jack 3.5mm/ Loa:</td>
                                    <td>Kh&ocirc;ng/ Loa k&eacute;p Stereo</td>
                                </tr>
                                <tr>
                                    <td>Pin:</td>
                                    <td>4323mAh, sạc nhanh 27W</td>
                                </tr>
                                <tr>
                                    <td>M&agrave;u sắc:</td>
                                    <td>Đen, Trắng, T&iacute;m, V&agrave;ng</td>
                                </tr>
                                <tr>
                                    <td>GPU:</td>
                                    <td>Apple GPU (5-core graphics)</td>
                                </tr>
                                <tr>
                                    <td>Ng&agrave;y ra mắt:</td>
                                    <td>7/9/2022</td>
                                </tr>
                                <tr>
                                    <td>Hệ điều h&agrave;nh:</td>
                                    <td>iOS 16</td>
                                </tr>
                                <tr>
                                    <td>Loại sản phẩm:</td>
                                    <td>Chưa k&iacute;ch hoạt</td>
                                </tr>
                                <tr>
                                    <td>Mạng/ Băng tần:</td>
                                    <td>GSM / CDMA / HSPA / EVDO / LTE / 5G</td>
                                </tr>
                                <tr>
                                    <td>K&iacute;ch thước:</td>
                                    <td>160.7 x 77.6 x 7.9 mm</td>
                                </tr>
                                <tr>
                                    <td>Trọng lượng:</td>
                                    <td>240 g</td>
                                </tr>
                                <tr>
                                    <td>Bluetooth:</td>
                                    <td>5.3, A2DP, LE</td>
                                </tr>
                                <tr>
                                    <td>Chuẩn bộ nhớ:</td>
                                    <td>NVMe</td>
                                </tr>
                                <tr>
                                    <td>Chuẩn &acirc;m thanh:</td>
                                    <td>24-bit/192kHz audio</td>
                                </tr>
                                <tr>
                                    <td>Wifi:</td>
                                    <td>Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot</td>
                                </tr>
                                <tr>
                                    <td>NFC:</td>
                                    <td>C&oacute;</td>
                                </tr>
                                <tr>
                                    <td>Cổng kết nối:</td>
                                    <td>Lightning, USB 2.0</td>
                                </tr>
                            </tbody>
                        </table>

                    </textarea>

                    @error('detail')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group ">
                    <input type="submit" class="btn btn-primary" value="Thêm mới">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('title');
        CKEDITOR.replace('detail');

        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files_image").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\"><i class=\"fa-solid\ fa-circle-xmark\"></i></span>" +
                                "</span>").insertAfter("#files_image");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>
@endsection
