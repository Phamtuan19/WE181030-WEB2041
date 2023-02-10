@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
@endsection

@section('title', 'Home Page')

@section('content-product')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <h4></h4>
                    </div>

                    <div class="col-lg-12 mt-2">

                        <div class="mt-2">
                            <p class="filter-title mb-2">Hãng sản xuất</p>

                            <div class="px-3">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a href="?brand=all" class="nav-link_a {!! request()->brand == 'all' ? 'filter-active' : '' !!}">Tất cả</a>
                                    </li>


                                    @foreach ($brands as $key => $brand)
                                    {{-- @dd(request()->brand == $brand->name) --}}
                                        <li class="nav-item">
                                            <a class="nav-link nav-link_a {!! request()->brand == $brand->name  ? 'filter-active' : '' !!}" aria-current="page"
                                                href="?brand={{ $brand->name }}&price={{ request()->price }}">{{ $brand->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- </form> --}}

                        <form method="GET" action="">
                            <div class="mt-4">
                                <p class="filter-title mb-2">Mức Giá</p>

                                <div class="px-3">

                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        {{-- @dd(request()->path()) --}}
                                        <li class="nav-item ">
                                            <a href="?brand={{ request()->brand }}&price=all" class="nav-link nav-link_a {!! request()->price == 'all' ? 'filter-active' : '' !!}">Tất
                                                cả</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="?brand={{ request()->brand }}&price=duoi-3-trieu" class="nav-link nav-link_a {!! request()->price == 'duoi-3-trieu' ? 'filter-active' : '' !!}">Dưới 3 triệu</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="?brand={{ request()->brand }}&price=tu-3-8-trieu" class="nav-link nav-link_a {!! request()->price == 'tu-3-8-trieu' ? 'filter-active' : '' !!}">Từ 3 - 8 triệu</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="?brand={{ request()->brand }}&price=tu-8-15-trieu" class="nav-link nav-link_a {!! request()->price == 'tu-8-15-trieu' ? 'filter-active' : '' !!}">Từ 8 -15 triệu</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="?brand={{ request()->brand }}&price=tren-15-trieu" class="nav-link nav-link_a {!! request()->price == 'tren-15-trieu' ? 'filter-active' : '' !!}">Trên 15 triệu</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="product-show ">
                            <div class="product-title">
                                <h2>Điện thoại nổi bật</h2>
                            </div>
                        </div>
                        @foreach ($products as $product)
                            {{-- @dd($product['avatar'][0]['path']) --}}
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="product">
                                    <span class="flag-installment">Trả góp 0%</span>
                                    @if ($product['promotion_price'])
                                        <span class="percent-deal">Giảm {!! currency_format($product['price'] - $product['promotion_price']) !!}</span>
                                    @endif

                                    <div class="product-img">

                                        @if ($product['avatar'] != null)
                                            <a href="{{ route('store.product', $product['id']) }}">
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
                                        <a href="{{ route('store.product', $product['id']) }}">
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
