@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/detail_product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')

    {{-- <div class="row flex-row justify-content-between product_content">

    </div> --}}
    <div class="container-fluid  product_content">
        <div class="row">
            {{-- Slider Image --}}
            <div class="col-lg-6">
                <div class="box-image_product">

                    {{-- Slider cha --}}
                    <div class="product-slider">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($product->image, true) as $image)
                                    <div class="d-flex justify-content-center swiper-slide">
                                        <img src="{{ asset($image) }}" class="product_img" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Slider con --}}
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($product->image, true) as $image)
                                <div class=" d-flex justify-content-center swiper-slide"
                                    style="border: 1px solid #ededed; padding: 2px; overflow: hidden;">
                                    <img src="{{ asset($image) }}" class="product_img_mini" alt="">
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
                    <h3>{{ $product->name }}</h3>
                    <span class="mt-4">Tình trạng: <b>Còn hàng</b></span>
                </div>

                {{-- Giá sản phảm --}}
                @if (!empty($product->sale))
                    <div class="price-region my-3">
                        <div class="price-current">
                            <span class="price_sale">{{ currency_format($product->sale) }}</span>
                            <span class="price_old">{{ currency_format($product->price) }}</span>
                        </div>
                    </div>
                @else
                    <div class="price-region my-3">
                        <div class="price-current">
                            <span class="price_sale">{{ currency_format($product->price) }}</span>
                        </div>
                    </div>
                @endif
                {{-- End --}}

                <div class="attribute">
                    <div class="my-3">
                        <span class="attribute-title">Dung lượng <small>64GB</small></span>
                        <div class="option-list mt-2">
                            <div class="form-group">
                                <input type="radio" id="attribute-memory_64" class="form-control" name="attribute-memory"
                                    hidden>
                                <label for="attribute-memory_64" class="attribute-memory_label">64GB</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" id="attribute-memory_128" class="form-control" name="attribute"
                                    hidden>
                                <label for="attribute-memory_128" class="attribute-memory_label">128GB</label>
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        <span class="attribute-title">Màu sắc <small>Black</small></span>
                        <div class="option-list mt-2">
                            <div class="form-group ">
                                <input type="radio" id="attribute-color_white" class="form-control" name="attribute"
                                    hidden>
                                <label for="attribute-color_white" class="attribute-color_label selected-value"
                                    style="background-color: #fff"></label>
                            </div>
                            <div class="form-group ">
                                <input type="radio" id="attribute-color_black" class="form-control" name="attribute"
                                    hidden>
                                <label for="attribute-color_black" class="attribute-color_label selected-value"
                                    style="background-color: #333"></label>
                            </div>
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

                    <button class="order-add" style="">Thêm vào giỏ hàng</button>

                </div>

                {{-- <div class="place-order" style="margin-top: 24px">
                    <form action="" method="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control bg-danger" value="Đặt ngay" style="color: #fff">
                        </div>
                    </form>
                </div> --}}

            </div>



            <div class="col-12 mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="table-title">Thông số kỹ thuật</h5>
                            <div class="table-box">

                                {!! $product->detail !!}

                            </div>
                            <div class="d-flex justify-content-center ">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary my-3 mx-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Xem thông tin chi tiết
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 50px;">
                                    <div class="modal-dialog" style="max-width: 700px !important">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">THÔNG SỐ KĨ THUẬT</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body compare_table" style="height: 550px !important">
                                                {!! $product->detail !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" style="overflow: hidden">
                            <h5 class="table-title">Bài viết</h5>

                            <h2>iPhone 14 Pro Max 128GB - chiếc iPhone g&acirc;y bất ngờ với nhiều t&iacute;nh năng mới lạ
                            </h2>

                            <p><em><strong><a href="https://didongviet.vn/iphone-14.html">iPhone 14 Pro
                                            Max</a>&nbsp;</strong></em>được xem l&agrave; chiếc iPhone đ&aacute;ng mua nhất
                                trong năm trong năm 2022 v&igrave; c&oacute; thể đ&aacute;p ứng tốt hầu hết mọi nhu cầu của
                                người d&ugrave;ng từ cơ bản đến n&acirc;ng cao. Với sự n&acirc;ng cấp mạnh mẽ về mặt phần
                                cứng với camera l&ecirc;n đến 48MP, bộ nhớ trong 1TB, m&agrave;n h&igrave;nh thiết kế mới
                                hứa hẹn sẽ mang lại trải nghiệm v&ocirc; c&ugrave;ng tuyệt vời đến người d&ugrave;ng.</p>

                            <p><img alt="iPhone 14 Pro Max 128GB - chiếc iPhone gây bất ngờ với nhiều tính năng mới lạ"
                                    src="https://cdn.didongviet.vn/pub/media/wysiwyg/2022/san-pham/apple-product/iphone-14-pro-max-128gb-didongviet.jpg" />
                            </p>

                            <h3>H&igrave;nh ảnh sắc n&eacute;t - trải nghiệm mượt m&agrave; với tần số qu&eacute;t 120Hz
                            </h3>

                            <p>M&agrave;n h&igrave;nh iPhone&nbsp;<em><strong><a
                                            href="https://didongviet.vn/iphone-14-pro-max-128gb.html">14 Pro Max
                                            128GB</a></strong></em>&nbsp;được Apple thay đổi ho&agrave;n to&agrave;n với
                                phần viền m&agrave;n h&igrave;nh được l&agrave;m mỏng đều ở 4 cạnh, đi k&egrave;m với phần
                                notch được thiết kế h&igrave;nh giọt nước thay v&igrave; tai thỏ như tr&ecirc;n c&aacute;c
                                phi&ecirc;n bản tiền nhiệm. Sự thay đổi n&agrave;y mang lại cho người d&ugrave;ng trải
                                nghiệm h&igrave;nh ảnh tốt hơn, kh&ocirc;ng gian rộng r&atilde;i hơn cũng như
                                &ldquo;sexy&rdquo; hơn khi so với c&aacute;c d&ograve;ng flagship kh&aacute;c.</p>

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
    </script>
@endsection
