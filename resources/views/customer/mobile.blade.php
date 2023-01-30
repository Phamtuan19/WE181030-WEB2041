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
                                <img src="http://127.0.0.1:8000/{{ $product->avatar }}" class="product-image"
                                    alt="">
                            </a>
                        </div>
                        <div class="product-name mb-3">
                            <a href="{{ route('store.product', $product->id) }}">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>
                        <div class="product-price mb-3">
                            <span class="old-price">{{ currency_format($product->price) }}</span>
                            <span class="actual-price">{{ currency_format($product->sale) }}</span>
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
{{--
@section('js')



    <script>
        $(document).ready(function() {

            function showData(data) {
                const a = data.map(function(value) {
                    return `
                    <div class=" col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <a href="http://127.0.0.1:8000/store/mobile/${value.name}/${value.id}" class="nav-link">
                                    <div class="card_img">
                                        <img src="http://127.0.0.1:8000/${value.avatar}" class="card-img-top card-image"
                                            alt="...">
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="card-name ">${value.name}</h5>

                                        <div class="card-price ">
                                            <p class="card-price_show">18.890.000&nbsp;đ</p>
                                            <p class="card-price_through">24.990.000&nbsp;đ</p>
                                        </div>

                                        <div class="product__promotions">
                                            <div class="promotion">
                                                <div class="coupon-price"> Nhập mã CPSONL500 khi thanh toán VNPAY qua
                                                    website
                                                    hoặc
                                                    CPS500
                                                    qua QR
                                                    Offline tại cửa hàng để giảm thêm 500k khi mua sản phẩm Apple từ 17
                                                    triệu và
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
                    `
                })
                $('#show_product').html(a);
            }

            window.addEventListener("load", function() {
                $.ajax({
                    url: "{{ route('mobile') }}",
                    type: 'GET',
                    datatype: 'json',
                    success: (data) => showData(data),
                })
            })

            const listCheckBrand = []
            $('.checkBrand').click(function() {
                if (this.checked) {
                    const _checkBrand = $(this).val();
                    // kiểm tra va push vào mảng
                    if (listCheckBrand.length === 0) {
                        listCheckBrand.push(_checkBrand)
                    } else if (!listCheckBrand.includes(_checkBrand)) {
                        listCheckBrand.push(_checkBrand)
                    }
                    $.ajax({
                        type: "GET",
                        data: "array",
                        url: "{{ route('mobile') }}?brand=" + listCheckBrand.join(","),
                        success: (data) => showData(data),
                    });


                }

            });

        })

        // const brandAll = document.querySelectorAll('.checkBrand')
        // brandAll.forEach(function(e, index) {
        //     e.onclick = () => {
        //         $.ajax({
        //             url: "{{ route('mobile') }}?price= " + e.value,
        //             type: 'GET',
        //             // datatype: 'json',
        //             success: (data) => showData(data),
        //         })
        //     }
        // })

        // var _checkBrand;

        // $('.checkBrand').each(function(index) {
        //     $('.checkBrand').click(function() {
        //         _checkBrand = $(this).val();
        //         console.log(_checkBrand);
        //         $.ajax({
        //             url: "{{ route('mobile') }}?price= " + _checkBrand,
        //             type: 'GET',
        //             // datatype: 'json',
        //             success: (data) => showData(data),
        //         })
        //     })
        // })
    </script>
@endsection --}}

@section('js')
@endsection
