@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
@endsection

@section('title', 'Home Page')

@section('content-product')
    <div class="container-fluid">
        <div class="row">
            {{-- sản phẩm nổi bật --}}
            <div class="col-12 product-show ">
                <div class="product-title px-2 d-flex justify-content-between">
                    <h2>Điện thoại nổi bật</h2>
                </div>
            </div>
            @foreach ($products as $product)
                <div class=" col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="product" style="min-height: 400px !important">
                        <div class="product-label mb-3">
                            <div class="flag-installment">Trả góp 0%</div>
                            <div class="percent-deal">Giảm {!! currency_format($product->price - $product->sale) !!}</div>
                        </div>
                        <div class="product-img mb-3">
                            <a href="{{ route('store.product', $product->id) }}">
                                <img src="{{ asset($product->image[0]->image) }}" class="product-image"
                                    alt="">
                            </a>
                        </div>
                        <div class="product-name mb-3">
                            <a href="{{ route('store.product', $product->id) }}">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>
                        <div class="product-price mb-3">
                            <span class="old-price">{{ currency_format($product->import_price) }}</span>
                            <span class="actual-price">{{ currency_format($product->price) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>
    {{-- End --}}

    </div>
    </div>

@endsection

@section('js')
@endsection
