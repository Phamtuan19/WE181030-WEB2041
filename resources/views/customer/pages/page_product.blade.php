@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/detail_product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="container-fluid  product_content">
        <div class="row">
            {{-- Slider Image --}}
            <div class="col-lg-6">
                <div class="box-image_product">

                    {{-- Slider cha --}}
                    <div class="product-slider">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($product->image as $value)
                                    <div class="d-flex justify-content-center swiper-slide">
                                        <img src="http://127.0.0.1:8000/{{ $value->image }}" class="product_img"
                                            alt="" data-image="{{ $value->image }}">
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
                                    <img src="http://127.0.0.1:8000/{{ $value->image }}" class="product_img_mini"
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
                    <h3 class="product_name" data-name="{{ $product->name }}">{{ $product->name }}</h3>
                    <span class="mt-4">Tình trạng:
                        @if ($product->quantity_stock > 0)
                            <b>Còn hàng</b>
                        @else
                            <b style="color: #e03e2d">Hết hàng</b>
                        @endif
                    </span>
                </div>

                {{-- Giá sản phảm --}}
                @if ($product->price < $product->import_price)
                    <div class="price-region my-3">
                        <div class="price-current">
                            <span class="price_sale" data-price="{{ $product->price }}">{{ currency_format($product->price) }}</span>
                            <span class="price_old">{{ currency_format($product->import_price) }}</span>
                        </div>
                    </div>
                @else
                    <div class="price-region my-3">
                        <div class="price-current">
                            <span class="price_sale" data-price="{{ $product->price }}">{{ currency_format($product->import_price) }}</span>
                        </div>
                    </div>
                @endif
                {{-- End --}}

                <div class="attribute">
                    <div class="my-3">
                        <span class="attribute-title">Dung lượng : <b class="title-memory"></b></span>
                        <div class="option-list op_list_1 mt-2">
                            @foreach (json_decode($product->attribute->memory, true) as $value)
                                <div class="form-group a">
                                    <label for="attribute-memory_{{ $value }}" data-memory="{{ $value }}"
                                        class="attribute-memory_label ">{{ $value }}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="my-3">
                        <span class="attribute-title">Màu sắc : <b class="title-color"></b></span>
                        <div class="option-list op_list_2 mt-2">
                            @foreach (json_decode($product->attribute->color, true) as $value)
                                <div class="form-group ">
                                    <label for="attribute-color_white" class="attribute-color_label"
                                        data-color="{{ $value }}"
                                        style="background-color: {{ $value }}"></label>
                                </div>
                            @endforeach
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
                                <strong style="color: #e03e2d">Tết mới - Trúng trọn bộ Apple 99 triệu đồng -
                                    <a href="#">Chi tiết</a>
                                </strong>
                            </span>
                        </p>
                        <p class="mb-2">
                            <span>
                                <strong style="color: #e03e2d">Ưu đãi cổng thanh toán:</strong>
                            </span>
                        </p>
                        <p class="mb-2">● Giảm 5% tối đa 300.000đ qua Moca (code: SDMOCA1 - SL có hạn)</p>
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
                        data-image="{{ $product->image[0]->image }}" data-price="{{ $product->price }}"
                        data-name="{{ $product->name }}" style="">Thêm vào giỏ
                        hàng</button>

                </div>

            </div>



            <div class="col-12 mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        /* ================== Slider =================== */
        var swiper = new Swiper(".mySwiper2", {
            spaceBetween: 5,
            slidesPerView: 5,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper", {
            spaceBetween: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        $(document).ready(function() {

            $(window).load(function() {
                $(".option-list .form-group:first-child .attribute-memory_label").addClass("active");
                $(".title-memory").html($(".option-list .form-group:first-child .attribute-memory_label").html())

                $(".option-list .form-group:first-child .attribute-color_label").addClass("active");
                $(".title-color").html($(".option-list .form-group:first-child .attribute-color_label").data("color"))
            });

            $(".attribute-memory_label").click(function() {

                $(".title-memory").html($(this).html())

                $(".attribute-memory_label").removeClass("active")

                $(this).addClass("active")
            })

            $('.attribute-color_label').click(function() {
                $(".title-color").html($(this).data("color"))

                $(".attribute-color_label").removeClass("active")

                $(this).toggleClass('active')
            })

            $('.order-add').click(function() {
                console.log();
                let code = $(".order-add").data("code");
                let image = $(".product_img").data("image");
                let price = $(".price_sale").data("price");
                let name = $(".product_name").data("name");
                let color = $(".title-color").html();
                let memory = $(".title-memory").html();

                console.log(memory);

                addToCart(code, image, price, name, color, memory);
            });

        });
    </script>
@endsection
