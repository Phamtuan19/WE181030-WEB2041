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

        <div class="container">
            <div class="row">
                {{-- <div class="swiper mySwiper">
                    <div class="swiper-wrapper"> --}}

                <div class="swiper mySwiper-product my-2">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="product swiper-slide">
                                <span class="flag-installment">Trả góp 0%</span>
                                <span class="percent-deal">Giảm {!! currency_format($product->import_price - $product->price) !!}</span>
                                <div class="product-img">
                                    <a href="{{ route('store.product', $product->id) }}">
                                        <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="">
                                        <span>{{ $product->name }}</span>
                                    </a>
                                </div>
                                <div class="product-price mb-3">
                                    <span class="old-price">{{ currency_format($product->import_price) }}</span>
                                    <span class="actual-price">{{ currency_format($product->price) }}</span>
                                </div>

                                <div class="d-flex justify-content-between">

                                    <button class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to cart">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>

                                    <button class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>

                                </div>

                            </div>
                        @endforeach
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
            <div class="row">
                {{-- <div class=" col-lg-3 col-md-4 col-sm-6 col-12"> --}}
                <div class="swiper mySwiper-product">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="product swiper-slide">
                                <div class="product-label mb-3">
                                    <div class="flag-installment">Trả góp 0%</div>
                                    <div class="percent-deal">Giảm {!! currency_format($product->import_price - $product->price) !!}</div>
                                </div>
                                <div class="product-img">
                                    <a href="{{ route('store.product', $product->id) }}">
                                        <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="">
                                        <span>{{ $product->name }}</span>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <span class="old-price">{{ currency_format($product->import_price) }}</span>
                                    <span class="actual-price">{{ currency_format($product->price) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>

    </div>
    {{-- End --}}

@endsection


@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper-product", {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            }
        });

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
