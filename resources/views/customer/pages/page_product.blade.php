@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/detail_product.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/comment.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 ">
                        {{-- Slider Image --}}
                        <div class="product_content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box-image_product">

                                        {{-- Slider cha --}}
                                        <div class="product-slider">
                                            <div class="swiper mySwiper">
                                                <div class="swiper-wrapper">

                                                    @foreach ($product->image as $value)
                                                        <div class="d-flex justify-content-center swiper-slide">
                                                            <img src="{{ $value->path }}" class="product_img"
                                                                alt="" data-image="{{ $value->path }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Slider con --}}
                                        <div class="swiper mySwiper2 mt-3">
                                            <div class="swiper-wrapper">
                                                {{-- @dd($product->image) --}}
                                                @foreach ($product->image as $value)
                                                    <div class=" d-flex justify-content-center swiper-slide"
                                                        style="border: 1px solid #ededed; padding: 2px; overflow: hidden;">
                                                        <img src="{{ $value->path }}" class="product_img_mini"
                                                            alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- End Slider --}}

                                {{--  --}}
                                <div class="col-lg-6">
                                    {{-- Product name --}}
                                    <div class="info-name">
                                        <div class="">
                                            <h3 class="product_name" data-name="{{ $product->name }}">{{ $product->name }}
                                            </h3>
                                            <span class="mt-4">Tình trạng:
                                                @if ($product->quantity_stock > 0)
                                                    <b>Còn hàng</b>
                                                @else
                                                    <b style="color: #e03e2d">Hết hàng</b>
                                                @endif
                                            </span>
                                        </div>

                                        @if ($product->quantity_sold != null)
                                            <div class="" style="margin-bottom: 37px;">
                                                <span style="font-size: 16px; font-weight: 500">Đã bán: </span>
                                                <span
                                                    style="font-size: 16px; font-weight: 500; color: red">{{ $product->quantity_sold }}</span>
                                                <span style="font-size: 16px; font-weight: 500">sp</span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Giá sản phảm --}}
                                    @if (!empty($product->promotion_price))
                                        <div class="price-region my-3">
                                            <div class="price-current">
                                                <span class="price_sale"
                                                    data-price="{{ $product->promotion_price }}">{{ currency_format($product->promotion_price) }}</span>
                                                <span class="price_old">{{ currency_format($product->price) }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="price-region my-3">
                                            <div class="price-current">
                                                <span class="price_sale"
                                                    data-price="{{ $product->price }}">{{ currency_format($product->price) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- End --}}

                                    <div class="attribute">
                                        <div class="my-3">
                                            <span class="attribute-title">Dung lượng : <b class="title-memory"></b></span>
                                            <div class="option-list op_list_1 mt-2">

                                                @if (json_decode($product->attribute->memory, true))
                                                    @foreach (json_decode($product->attribute->memory, true) as $value)
                                                        <div class="form-group a">
                                                            <label for="attribute-memory_{{ $value }}"
                                                                data-memory="{{ $value }}"
                                                                class="attribute-memory_label ">{{ $value }}</label>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>

                                        <div class="my-3">
                                            <span class="attribute-title">Màu sắc : <b class="title-color"></b></span>
                                            <div class="option-list op_list_2 mt-2">

                                                @if (json_decode($product->attribute->color, true))

                                                    @foreach (json_decode($product->attribute->color, true) as $value)
                                                        <div class="form-group ">
                                                            <label for="attribute-color_white" class="attribute-color_label"
                                                                data-color="{{ $value }}"
                                                                style="background-color: {{ $value }}"></label>
                                                        </div>
                                                    @endforeach

                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="short-des">
                                        <div class="short-des_title">
                                            <i class="fa-solid fa-gift me-2"></i>
                                            Ưu đãi thêm
                                        </div>
                                        <div class="short-description">
                                            <p class="mb-2">
                                                <span>
                                                    <strong style="color: #e03e2d">Tết mới - Trúng trọn bộ Apple 99 triệu
                                                        đồng -
                                                        <a href="#">Chi tiết</a>
                                                    </strong>
                                                </span>
                                            </p>
                                            <p class="mb-2">
                                                <span>
                                                    <strong style="color: #e03e2d">Ưu đãi cổng thanh toán:</strong>
                                                </span>
                                            </p>
                                            <p class="mb-2">● Giảm 5% tối đa 300.000đ qua Moca (code: SDMOCA1 - SL có hạn)
                                            </p>
                                            <p class="mb-2">
                                                <span>
                                                    <strong style="color: #e03e2d">Ưu đãi mua kèm:</strong>
                                                </span>
                                            </p>
                                            <p class="mb-2">● Giảm tới 500.000đ khi mua Marshall Stanmore II</p>
                                            <p class="mb-2">● Mua nhiều giảm sâu:</p>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Mua combo 3 phụ kiện</td>
                                                        <td>Mua combo 4 phụ kiện</td>
                                                        <td>Mua combo 5 phụ kiện</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Giảm 200.000đ</td>
                                                        <td>Giảm 300.000đ</td>
                                                        <td>Giảm 400.000đ</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="mb-2">● Giảm 200.000đ khi mua Apple Care</p>
                                            <p class="mb-2">● Giảm tới 200.000đ khi mua kèm AirPods </p>
                                            <p class="mb-2">
                                                <span>
                                                    <strong style="color: #e03e2d">Ưu đãi đặc quyền:</strong>
                                                </span>
                                            </p>
                                            <p class="mb-2">● Tặng đến 4 triệu khi thu cũ đổi mới lên đời iPhone</p>
                                        </div>
                                    </div>

                                    <div class="products-order">

                                        <button class="order-add" data-code="{{ $product->code }}"
                                            data-image="{{ $product->image[0]->image }}"
                                            data-price="{{ !empty($product->promotion_price) ? $product->promotion_price : $product->price }}"
                                            data-name="{{ $product->name }}" style="">Thêm vào giỏ
                                            hàng</button>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6" style="text-align: justify; margin-top: 12px">
                                            <div class="title-bg-r" style="margin-bottom: 12px">
                                                Mô tả sản phẩm
                                            </div>
                                            {!! $product['information'] !!}
                                        </div>
                                        <div class="col-lg-6"
                                            style="max-height: 609px; overflow: hidden; padding-top: 12px; padding-bottom: 12px; position: relative;">
                                            <div class="title-bg-r">
                                                Thông số kĩ thuật
                                            </div>
                                            {!! $product['detail'] !!}

                                            <div class="view-more-detail-char" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop" style="position: absolute">
                                                <span>Xem chi tiết</span>
                                            </div>

                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content"
                                                        style="transform: translateX(-13%); width: 700px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal
                                                                title
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! $product['detail'] !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Scrollable modal -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="comment" style="padding-top: 1px">
                    @include('customer.layout.comment')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Swiper JS -->
    <script src="{{ asset('customer/js/product_detail.js') }}"></script>
    <script src="{{ asset('customer/js/comment.js') }}"></script>

    <script>
        $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
            console.log(JSON.stringify(data, null, 2));
        });
    </script>
@endsection
