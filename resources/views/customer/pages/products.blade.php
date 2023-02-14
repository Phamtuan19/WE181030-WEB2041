@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
@endsection

@section('title', 'Home Page')

@section('content-product')
    {{-- @dd(request()->ip()) --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">

                    <div class="col-lg-12 filter-product">
                        <div class="mt-2">
                            <p class="filter-title mb-2">Loại sản phẩm</p>

                            <div class="px-3">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a href="?category=&brand={{ request()->brand }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link_a {!! request()->category == '' ? 'filter-active' : '' !!}">Tất cả</a>
                                    </li>


                                    @foreach ($categories as $category)
                                        <li class="nav-item">
                                            <a class="nav-link nav-link_a {!! request()->category == $category->slug ? 'filter-active' : '' !!}" aria-current="page"
                                                href="?category={{ $category->slug }}&brand={{ request()->brand }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="filter-title mb-2">Hãng sản xuất</p>

                            <div class="px-3">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a href="?brand=&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link_a {!! request()->brand == '' ? 'filter-active' : '' !!}">Tất cả</a>
                                    </li>


                                    @foreach ($brands as $key => $brand)
                                        {{-- @dd(request()->brand == $brand->name) --}}
                                        <li class="nav-item">
                                            <a class="nav-link nav-link_a {!! request()->brand == $brand->name ? 'filter-active' : '' !!}" aria-current="page"
                                                href="?brand={{ $brand->name }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">{{ $brand->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- </form> --}}

                        <div class="mt-4">
                            <p class="filter-title mb-2">Mức Giá</p>

                            <div class="px-3">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    {{-- @dd(request()->path()) --}}
                                    <li class="nav-item ">
                                        <a href="?brand={{ request()->brand }}&price=&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link nav-link_a {!! request()->price == '' ? 'filter-active' : false !!}">Tất
                                            cả</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="?brand={{ request()->brand }}&price=duoi-3-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link nav-link_a {!! request()->price == 'duoi-3-trieu' ? 'filter-active' : '' !!}">Dưới 3 triệu</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="?brand={{ request()->brand }}&price=tu-3-8-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link nav-link_a {!! request()->price == 'tu-3-8-trieu' ? 'filter-active' : '' !!}">Từ 3 - 8 triệu</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="?brand={{ request()->brand }}&price=tu-8-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link nav-link_a {!! request()->price == 'tu-8-15-trieu' ? 'filter-active' : '' !!}">Từ 8 -15 triệu</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="?brand={{ request()->brand }}&price=tren-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                            class="nav-link nav-link_a {!! request()->price == 'tren-15-trieu' ? 'filter-active' : '' !!}">Trên 15 triệu</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 product-filter__orderBy">
                            <div class="container-fluid">
                                <div class="row product-filter__orderBy__row" style=" ">
                                    <div class="col-lg-2">
                                        <a href="?brand={{ request()->brand }}&price={{ request()->price }}&orderType=price&orderBy=DESC"
                                            style="font-size: 16px; font-weight: 500"
                                            class="order__by__a {!! request()->orderType == 'price' && request()->orderBy == 'DESC' ? 'order_by__active' : '' !!}">
                                            Giá lớn nhất
                                            <i class="fa-solid fa-right-left right-left"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-2">
                                        <a href="?brand={{ request()->brand }}&price={{ request()->price }}&orderType=price&orderBy=ASC"
                                            style="font-size: 16px; font-weight: 500"
                                            class="order__by__a {!! request()->orderType == 'price' && request()->orderBy == 'ASC' ? 'order_by__active' : '' !!}">
                                            Giá nhỏ nhất
                                            <i class="fa-solid fa-right-left right-left"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-3">
                                        <a href="?brand={{ request()->brand }}&price={{ request()->price }}&orderType=created_at&orderBy=DESC"
                                            style="font-size: 16px; font-weight: 500"
                                            class="order__by__a {!! request()->orderType == 'created_at' && request()->orderBy == 'DESC' ? 'order_by__active' : '' !!}">
                                            Sản phẩm mới nhất
                                            <i class="fa-solid fa-right-left right-left"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-3">
                                        <a href="?brand={{ request()->brand }}&price={{ request()->price }}&orderType=created_at&orderBy=ASC"
                                            style="font-size: 16px; font-weight: 500"
                                            class="order__by__a {!! request()->orderType == 'created_at' && request()->orderBy == 'ASC' ? 'order_by__active' : '' !!}">
                                            Sản phẩm cũ nhất
                                            <i class="fa-solid fa-right-left right-left"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>


                        @foreach ($products as $product)
                            {{-- @dd($product['avatar'][0]['path']) --}}
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="product">
                                    <span class="flag-installment">Trả góp 0%</span>
                                    @if ($product['promotion_price'])
                                        <span class="percent-deal">Giảm
                                            {{ percentReduction($product['price'], $product['promotion_price']) }}
                                        </span>
                                    @endif

                                    <div class="product-img">

                                        @if ($product['avatar'] != null)
                                            <a href="{{ route('store.product', $product['code']) }}">
                                                <img src="{{ $product['avatar'][0]['path'] }}" class="product-image"
                                                    alt="">
                                            </a>
                                        @else
                                            <a href="{{ route('store.product', $product->id) }}">
                                                <img src="{{ $product->image[0]->path }}" class="product-image"
                                                    alt="">
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
                                            <span
                                                class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
                                        @else
                                            <span class="actual-price">{{ currency_format($product['price']) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <div class="mx-auto" style="display: table;">
                                {{ $products->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    {{-- End --}}

    </div>
    </div>

@endsection

@section('js')
@endsection
