@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Home Page')


@section('content-product')

    {{-- sản phẩm nổi bật --}}
    <div class="container">
        <div class="row">

            <div class="col-12 mt-4 mb-3">
                <div class="product-title d-flex justify-content-between">
                    <h2>Sản phảm mới nhất</h2>
                </div>
            </div>

            @foreach ($newProduct as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="product">
                        <span class="flag-installment">Trả góp 0%</span>
                        @if ($product['promotion_price'])
                            <span class="percent-deal">Giảm {!! currency_format($product['price'] - $product['promotion_price']) !!}</span>
                        @endif

                        <div class="product-img">
                            @if ($product['avatar'] != null)
                                <a href="{{ route('store.product', $product['id']) }}">
                                    <img src="{{ $product['avatar'][0]['path'] }}" class="product-image" alt="">
                                </a>
                            @else
                                <a href="{{ route('store.product', $product->id) }}">
                                    <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                </a>
                            @endif
                        </div>

                        <div class="product-name">
                            <a href="{{ route('store.product', $product->id) }}" class="">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>

                        <div class="product-price mb-3">
                            @if ($product['promotion_price'] != null)
                                <span class="old-price">{{ currency_format($product['price']) }}</span>
                                <span class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
                            @else
                                <span class="actual-price">{{ currency_format($product['price']) }}</span>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="product">
                        <span class="flag-installment">Trả góp 0%</span>
                        @if ($product['promotion_price'])
                            <span class="percent-deal">Giảm {!! currency_format($product['price'] - $product['promotion_price']) !!}</span>
                        @endif

                        <div class="product-img">
                            @if ($product['avatar'] != null)
                                <a href="{{ route('store.product', $product['id']) }}">
                                    <img src="{{ $product['avatar'][0]['path'] }}" class="product-image" alt="">
                                </a>
                            @else
                                <a href="{{ route('store.product', $product->id) }}">
                                    <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                </a>
                            @endif
                        </div>

                        <div class="product-name">
                            <a href="{{ route('store.product', $product->id) }}" class="">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>

                        <div class="product-price mb-3">
                            @if ($product['promotion_price'] != null)
                                <span class="old-price">{{ currency_format($product['price']) }}</span>
                                <span class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
                            @else
                                <span class="actual-price">{{ currency_format($product['price']) }}</span>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 mb-3" style="text-align: center;">
                <a class="btn btn-primary"> Xem thêm <i class="fa-solid fa-right-long" style="margin-left: 12px"></i> </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 mb-3 mt-4">
                <img src="https://images.fpt.shop/unsafe/fit-in/1200x200/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/2/1/638108624627380048_H5_1200x200.png"
                    alt="" style="width: 100%;">
            </div>

            <div class="col-12  mb-3">
                <div class="product-title d-flex justify-content-between">
                    <h2>Điện thoại bán chạy nhất</h2>
                </div>
            </div>

            @foreach ($newProduct as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="product">
                        <span class="flag-installment">Trả góp 0%</span>
                        @if ($product['promotion_price'])
                            <span class="percent-deal">Giảm {!! currency_format($product['price'] - $product['promotion_price']) !!}</span>
                        @endif

                        <div class="product-img">
                            @if ($product['avatar'] != null)
                                <a href="{{ route('store.product', $product['id']) }}">
                                    <img src="{{ $product['avatar'][0]['path'] }}" class="product-image" alt="">
                                </a>
                            @else
                                <a href="{{ route('store.product', $product->id) }}">
                                    <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                </a>
                            @endif
                        </div>

                        <div class="product-name">
                            <a href="{{ route('store.product', $product->id) }}" class="">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>

                        <div class="product-price mb-3">
                            @if ($product['promotion_price'] != null)
                                <span class="old-price">{{ currency_format($product['price']) }}</span>
                                <span class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
                            @else
                                <span class="actual-price">{{ currency_format($product['price']) }}</span>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 mb-3" style="text-align: center;">
                <a class="btn btn-primary"> Xem thêm <i class="fa-solid fa-right-long" style="margin-left: 12px"></i> </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3 mt-4 px-0">
                <img src="https://images.fpt.shop/unsafe/fit-in/1200x200/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/2/1/638108619876429406_F-H5_1200x200.png"
                    alt="" style="width: 100%;">
            </div>

            <div class="col-12 mt-4 mb-3">
                <div class="product-title d-flex justify-content-between">
                    <h2>Laptop bán chạy nhất</h2>
                </div>
            </div>

            @foreach ($newProduct as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="product">
                        <span class="flag-installment">Trả góp 0%</span>
                        @if ($product['promotion_price'])
                            <span class="percent-deal">Giảm {!! currency_format($product['price'] - $product['promotion_price']) !!}</span>
                        @endif

                        <div class="product-img">
                            @if ($product['avatar'] != null)
                                <a href="{{ route('store.product', $product['id']) }}">
                                    <img src="{{ $product['avatar'][0]['path'] }}" class="product-image" alt="">
                                </a>
                            @else
                                <a href="{{ route('store.product', $product->id) }}">
                                    <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                </a>
                            @endif
                        </div>

                        <div class="product-name">
                            <a href="{{ route('store.product', $product->id) }}" class="">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>

                        <div class="product-price mb-3">
                            @if ($product['promotion_price'] != null)
                                <span class="old-price">{{ currency_format($product['price']) }}</span>
                                <span class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
                            @else
                                <span class="actual-price">{{ currency_format($product['price']) }}</span>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 mb-3" style="text-align: center;">
                <a class="btn btn-primary"> Xem thêm <i class="fa-solid fa-right-long" style="margin-left: 12px"></i>
                </a>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // var swiper = new Swiper(".mySwiper-product", {
        //     slidesPerView: 4,
        //     spaceBetween: 20,
        //     loop: true,
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        //     autoplay: {
        //         delay: 2500,
        //         disableOnInteraction: false,
        //     },
        //     breakpoints: {
        //         0: {
        //             slidesPerView: 1,
        //             spaceBetween: 20,
        //         },
        //         768: {
        //             slidesPerView: 2,
        //             spaceBetween: 40,
        //         },
        //         992: {
        //             slidesPerView: 3,
        //             spaceBetween: 40,
        //         },
        //         1024: {
        //             slidesPerView: 4,
        //             spaceBetween: 20,
        //         },
        //     }
        // });

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
