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
            {{-- <div class="background" style="background-color: #FFF"> --}}
            <div class="row">
                <div class="col-12 mt-4 mb-3">
                    <div class="product-title d-flex justify-content-center">
                        <h2>
                            <span>
                                Sản phẩm bán chạy nhất
                                <hr style="color: #333; margin: 12px 0;">
                            </span>
                            <p></p>
                        </h2>
                    </div>
                </div>

                @foreach ($selling_products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="product">
                            <span class="flag-installment">Trả góp 0%</span>
                            @if ($product['promotion_price'])
                                {{-- @dd($product['promotion_price']) --}}
                                <span class="percent-deal">Giảm
                                    {{ percentReduction($product['price'], $product['promotion_price']) }}</span>
                            @endif

                            <div class="product-img">

                                @if ($product['avatar'] != null)
                                    <a href="{{ route('store.product', $product['code']) }}">
                                        <img src="{{ $product['avatar'][0]['path'] }}" class="product-image" alt="">
                                    </a>
                                @else
                                    <a href="{{ route('store.product', $product->code) }}">
                                        <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                    </a>
                                @endif
                            </div>


                            <div class="product-name">
                                <a href="{{ route('store.product', $product['code']) }}">
                                    <span>{{ $product['name'] }}</span>
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

                <div class="show-all">
                    <a href="{{ route('store.list.products') }}?orderType=quantity_sold&orderBy=DESC">
                        Xem tất cả
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12 mt-4" style="margin-bottom: 50px">
                    <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/2/7/638113890324216138_F-C1_1200x300.png"
                        alt="" style="width: 100%;">
                </div>
                <div class="col-12  mb-3">
                    <div class="product-title d-flex justify-content-center">
                        <h2>
                            <span>
                                Sản phẩm mới nhất
                                <hr style="color: #333; margin: 12px 0;">
                            </span>
                            <p></p>
                        </h2>
                    </div>
                </div>

                {{-- @dd($products[0]) --}}

                @foreach ($new_products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="product">
                            <span class="flag-installment">Trả góp 0%</span>
                            @if ($product['promotion_price'])
                                <span class="percent-deal">Giảm
                                    {{ percentReduction($product['price'], $product['promotion_price']) }}</span>
                            @endif

                            <div class="product-img">

                                @if ($product['avatar'] != null)
                                    <a href="{{ route('store.product', $product['code']) }}">
                                        <img src="{{ $product['avatar'][0]['path'] }}" class="product-image"
                                            alt="">
                                    </a>
                                @else
                                    <a href="{{ route('store.product', $product->code) }}">
                                        <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                    </a>
                                @endif
                            </div>


                            <div class="product-name">
                                <a href="{{ route('store.product', $product['code']) }}">
                                    <span>{{ $product['name'] }}</span>
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

                <div class="show-all">
                    <a href="{{ route('store.list.products') }}?orderType=created_at&orderBy=DESC">
                        Xem tất cả
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12  mb-3">
                    <div class="product-title d-flex justify-content-center">
                        <h2>
                            <span>
                                Sản phẩm khác
                                <hr style="color: #333; margin: 12px 0;">
                            </span>
                            <p></p>
                        </h2>
                    </div>
                </div>

                @foreach ($other_products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="product">
                            <span class="flag-installment">Trả góp 0%</span>
                            @if ($product['promotion_price'])
                                <span class="percent-deal">Giảm
                                    {{ percentReduction($product['price'], $product['promotion_price']) }}</span>
                            @endif

                            <div class="product-img">

                                @if ($product['avatar'] != null)
                                    <a href="{{ route('store.product', $product['code']) }}">
                                        <img src="{{ $product['avatar'][0]['path'] }}" class="product-image"
                                            alt="">
                                    </a>
                                @else
                                    <a href="{{ route('store.product', $product->code) }}">
                                        <img src="{{ $product->image[0]->path }}" class="product-image" alt="">
                                    </a>
                                @endif
                            </div>


                            <div class="product-name">
                                <a href="{{ route('store.product', $product['code']) }}">
                                    <span>{{ $product['name'] }}</span>
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

                <div class="show-all">
                    <a href="{{ route('store.list.products') }}">
                        Xem tất cả
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12  mb-3">
                    <div class="product-title d-flex justify-content-center">
                        <h2>
                            <span>
                                Bài viết mới
                                <hr style="color: #333; margin: 12px 0;">
                            </span>
                            <p></p>
                        </h2>
                    </div>
                </div>

                @foreach ($new_posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ $post->avatar_path }}"
                                alt="{{ $post->slug }}">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <a href="{{ route('store.show.posts', $post->slug) }}">{{ $post->user->username }}</a>
                                <a href="#"><i class="ti-comments-smiley"></i>{{ $post->comments->count() }} Comments</a>
                            </div>
                            <a class="d-block" href="{{ route('store.show.posts', $post->id) }}">
                                <h4>{{ $post->title }}</h4>
                            </a>
                            <div class="text-wrap">
                                <p>
                                    {{ $post->introduction }}
                                </p>
                            </div>
                            <a href="{{ route('store.show.posts', $post->id) }}" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            {{-- </div> --}}
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
