@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/detail_product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')

    <div class="row flex-row justify-content-between product_content">
        <div class="row">
            {{-- Slider Image --}}
            <div class="col-4">
                <div class="box-image_product">

                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="item-border swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img" alt="">
                            </div>

                            <div class="item-border swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img" alt="">
                            </div>

                            <div class="item-border swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img" alt="">
                            </div>

                            <div class="item-border swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img" alt="">
                            </div>
                        </div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>

                            <div class="product_image swiper-slide">
                                <img src="https://dienthoaihay.vn/images/products/2022/10/08/large/xiaomi-mi-11t_1665195585.jpg"
                                    class="product_img_mini" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- End Slider --}}

            {{--  --}}
            <div class="col-5">
                {{-- Giá sản phảm --}}
                <div class="price-region">
                    <div class="price-current">
                        <span class="price_sale">5.890.000đ</span>
                        <span class="price_old">6.890.000đ</span>
                    </div>
                </div>
                {{-- End --}}

                {{-- detail selection --}}
                {{-- memory --}}
                <div class="select-memory">
                    <div class="title">
                        <strong>Bộ nhớ :</strong>
                    </div>
                    <p class="btn btn-light btn-outline-secondary select-memory-item memory">
                        <span>3/64GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>4/328GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>8/128GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>16/256GB</span>
                    </p>
                </div>

                <form action="">
                    {{-- color --}}
                    <div class="select-color">
                        <div class="title">
                            <strong>Chọn màu :</strong>
                        </div>
                        <p class="btn btn-success color-item " data-original-title="+0₫">
                            <input type="hidden" name="clor" value="vàng">
                        </p>
                        <p class="btn btn-success color-item "></p>
                        <p class="btn btn-success color-item "></p>
                        <p class="btn btn-success color-item "></p>
                    </div>

                    {{-- status --}}
                    <div class="select-status">
                        <div class="title">
                            <strong>Tình trạng :</strong>
                        </div>
                        <span class="">Còn hàng</span>
                    </div>
                    {{-- End detail selection --}}

                </form>

                {{-- promotion --}}
                <div class="promotion" style="margin-top: 36px">
                    <label class="promotion-title">Khuyến mãi</label>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
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
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 4,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        const color_item = document.querySelectorAll('.color-item');
        color_item.forEach((e, index) => {
            e.onclick = () => {
                const color = document.querySelectorAll('.color-item');
                color.forEach(item => {
                    item.classList.remove("after")
                })
                e.classList.add('after');

            }
        });

        const memory_item = document.querySelectorAll('.select-memory-item');
        memory_item.forEach((e, index) => {
            e.onclick = () => {
                console.log(e);
                const memory = document.querySelectorAll('.select-memory-item');
                memory.forEach(item => {
                    item.classList.remove("memory")
                })
                e.classList.add('memory');

            }
        });
    </script>
@endsection
