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
                {{-- @dd($product['avatar'][0]['path']) --}}
                <div class=" col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
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
                            @break
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
                            <span class="actual-price">{{ currency_format($product['promotion_price']) }}</span>
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
{{-- End --}}

</div>
</div>

@endsection

@section('js')
@endsection
