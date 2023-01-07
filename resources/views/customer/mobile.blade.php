@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/product.css') }}">
@endsection

@section('title', 'Home Page')

@section('content-product')
    <div class="row flex-row justify-content-between" style="margin: 0 -5px">
        <!-- Filter products -->
        <div class="col-3 product-show px-4">

            <form action="">
                <div class="mt-2">
                    <p class="filter-title mb-2">Hãng sản xuất</p>

                    <div class="px-3">
                        <div class="form-check">
                            <input class="form-check-input checkBox_all" type="checkbox" name="" value=""
                                id="brand" />
                            <label class="form-check-label" for="brand">Tất cả</label>
                        </div>

                        @foreach ($brands as $brand)
                            <div class="form-check">
                                <input class="form-check-input checkBrand" type="checkbox" name="brand"
                                    value="{{ $brand->id }}" id="{{ $brand->name }}" />
                                <label class="form-check-label" for="{{ $brand->name }}">{{ $brand->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>

            <form method="GET" action="">
                <div class="mt-4">
                    <p class="filter-title mb-2">Mức Giá</p>

                    <div class="px-3">
                        <div class="form-check">
                            <input class="form-check-input checkAll" checked type="checkbox" name="price[]" value="all"
                                id="check-price-all" />
                            <label class="form-check-label" for="check-price-all">Tất cả</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input selectedId" type="checkbox" name="price[]" value="2"
                                id="price_2" />
                            <label class="form-check-label" for="price_2">Dưới 2 triệu</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input selectedId" type="checkbox" name="price[]" value="3"
                                id="price_2-4" />
                            <label class="form-check-label" for="price_2-4">Từ 2 - 4 triệu</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input selectedId" type="checkbox" name="price[]" value="4"
                                id="price_4-7" />
                            <label class="form-check-label" for="price_4-7">Từ 4 - 7 triệu</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input selectedId" type="checkbox" name="price[]" value="5"
                                id="price_7-13" />
                            <label class="form-check-label" for="price_7-13">Từ 7 - 13 triệu</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input selectedId" type="checkbox" name="price[]" value="6"
                                id="price_13" />
                            <label class="form-check-label" for="price_13">Trên 13 triệu</label>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        {{-- sản phẩm nổi bật --}}
        <div class="col-9 product-show ">
            <div class="product-title px-2 d-flex justify-content-between">
                <h2>Điện thoại nổi bật</h2>
            </div>

            <div class="container mt-4">
                <div class="row" id="show_product" style="gap: 24px 0" >
                    @foreach ($products as $product)
                        <div class=" col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <a href="#" class="nav-link">
                                    <div class="card_img">
                                        <img src="{{ asset($product->avatar) }}" class="card-img-top card-image"
                                            alt="...">
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

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
                    @endforeach
                </div>
            </div>

        </div>
        {{-- End --}}

    </div>

@endsection

@section('js')



    <script>
        $(document).ready(function() {

            function showData(data) {
                const a = data.data.map(function(value) {
                    return `
                    <div class=" col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <a href="http://127.0.0.1:8000/store/mobile/${value.name}/${value.id}" class="nav-link">
                                    <div class="card_img">
                                        <img src="http://127.0.0.1:8000/${value.avatar}" class="card-img-top card-image"
                                            alt="...">
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="card-name ">Lenovo Gaming IdeaPad 3 15IAH7 i5 12500H/82S900H2VN</h5>

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

            $('#Iphone').click(function() {
                const __checkBox_all = $(this).val();
                console.log(__checkBox_all);
                $.ajax({
                    url: "{{ route('mobile') }}?brand= " + __checkBox_all,
                    type: 'GET',
                    // datatype: 'json',
                    success: (data) => showData(data),
                })
            })

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
@endsection
