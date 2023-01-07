@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Home Page')

@section('content-product')
    {{-- sản phẩm nổi bật --}}
    <div class="product-show">
        <div class="product-title px-2 d-flex justify-content-between">
            <h2>Điện thoại nổi bật</h2>
        </div>

        <div class="d-flex flex-wrap mt-2 justify-content-around" style="gap: 24px 10px; gap: 12px 0;">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card swiper-slide" style="width: 15rem;">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- End --}}


    {{-- Sản phẩm theo hãng --}}
    <div class="product-show">
        <div class="product-title px-2 d-flex justify-content-between">
            <h2>Điện thoại nổi bật</h2>
        </div>

        <div class="container">
            <div class="row mt-2 " style="gap: 24px 0;">
                {{-- <div class="swiper mySwiper">
                    <div class="swiper-wrapper"> --}}

                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="#" class="nav-link">
                            <div class="card_img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbtSpFsD0uKD1H5MPbO82v26Dmi5qGTdSaqQ&usqp=CAU"
                                    class="card-img-top card-image" alt="...">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

                                <div class="card-price ">
                                    <p class="card-price_show">18.890.000&nbsp;đ</p>
                                    <p class="card-price_through">24.990.000&nbsp;đ</p>
                                </div>

                                <div class="product__promotions">
                                    <div class="promotion">
                                        <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua website
                                            hoặc
                                            CPS500
                                            qua QR
                                            Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17 triệu và
                                            <b>2
                                                km</b>
                                            khác
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-order">
                                    <a href="#" class="btn card-order_1">Mua ngay</a>
                                    <a href="#" class="btn card-order_2">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>  

            </div>
        </div>

    </div>
    {{-- End --}}

@endsection

@section('js')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 10,
            slidesPerGroup: 1,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });
    </script>
@endsection
