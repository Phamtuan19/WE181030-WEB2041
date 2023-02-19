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

                    @include('customer.layout.filter_products')

                </div>
            </div>

            <div class="col-lg-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 product-filter__orderBy">
                            <div class="container-fluid">
                                <div class="row product-filter__orderBy__row" style=" ">
                                    @if (isset(request()->productType))
                                        <div class="col-lg-3">
                                            <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price={{ request()->price }}&orderBy=price&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                                style="font-size: 16px; font-weight: 500"
                                                class="order__by__a {!! request()->orderBy == 'price' && request()->orderType == 'DESC' ? 'order_by__active' : '' !!}">
                                                Xắp xếp theo giá
                                                <i class="fa-solid fa-right-left right-left"></i>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price={{ request()->price }}&orderBy=created_at&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                                style="font-size: 16px; font-weight: 500"
                                                class="order__by__a {!! request()->orderBy == 'created_at' && request()->orderType == 'DESC' ? 'order_by__active' : '' !!}">
                                                Sản phẩm mới nhất
                                                <i class="fa-solid fa-right-left right-left"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="col-lg-3">
                                            <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price={{ request()->price }}&orderBy=price&orderType=DESC"
                                                style="font-size: 16px; font-weight: 500"
                                                class="order__by__a {!! request()->orderBy == 'price' && request()->orderType == 'DESC' ? 'order_by__active' : '' !!}">
                                                Xắp xếp theo giá
                                                <i class="fa-solid fa-right-left right-left"></i>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price={{ request()->price }}&orderBy=created_at&orderType=DESC"
                                                style="font-size: 16px; font-weight: 500"
                                                class="order__by__a {!! request()->orderBy == 'created_at' && request()->orderType == 'DESC' ? 'order_by__active' : '' !!}">
                                                Sản phẩm mới nhất
                                                <i class="fa-solid fa-right-left right-left"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>


                        @if (!empty($products->count() > 0))
                            @foreach ($products as $product)
                                {{-- @dd($product['image']['0']->path) --}}
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                                    <div class="product">
                                        <span class="flag-installment">Trả góp 0%</span>
                                        @if ($product['promotion_price'])
                                            <span class="percent-deal">Giảm
                                                {{ percentReduction($product['price'], $product['promotion_price']) }}
                                            </span>
                                        @endif

                                        <div class="product-img">
                                            @foreach ($product->image as $image)
                                                @if ($image->is_avatar != null)
                                                    <img src="{{ $image->path }}" alt="" class="product-image"
                                                        style="width: 100%;">
                                                @endif
                                            @endforeach
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
                        @else
                            <p style="text-align: center; font-size: 16; font-weight: 600">Không có sản phẩm nào</p>
                        @endif

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
