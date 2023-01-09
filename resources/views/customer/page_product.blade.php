@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/detail_product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')

    {{-- <div class="row flex-row justify-content-between product_content">

    </div> --}}
    <div class="container  product_content">
        <div class="row">
            {{-- Slider Image --}}
            <div class="col-4">
                <div class="box-image_product">

                    {{-- Slider cha --}}
                    <div class="" style="width: 100%; height: 400px;">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($product[0]->image, true) as $image)
                                    <div class="item-border swiper-slide">
                                        <img src="{{ asset($image) }}" class="product_img" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Slider con --}}
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($product[0]->image, true) as $image)
                                <div class="product_image swiper-slide"
                                    style="border: 1px solid #ededed; padding: 2px; overflow: hidden;">
                                    <img src="{{ asset($image) }}" class="product_img_mini" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            {{-- End Slider --}}

            {{--  --}}
            <div class="col-5">
                {{-- Giá sản phảm --}}
                @if (!empty($product[0]->sale))
                    <div class="price-region">
                        <div class="price-current">
                            <span class="price_sale">{{ currency_format($product[0]->sale) }}</span>
                            <span class="price_old">{{ currency_format($product[0]->price) }}</span>
                        </div>
                    </div>
                @else
                    <div class="price-region">
                        <div class="price-current">
                            <span class="price_sale">{{ currency_format($product[0]->price) }}</span>
                        </div>
                    </div>
                @endif
                {{-- End --}}

                {{-- detail selection --}}
                {{-- memory --}}
                <div class="select-memory">
                    <div class="title">
                        <strong>Bộ nhớ :</strong>
                    </div>
                    <p class="btn btn-light btn-outline-secondary select-memory-item memory">
                        <span>3/64GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>4/328GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>8/128GB</span>
                    </p>

                    <p class="btn btn-light btn-outline-secondary select-memory-item">
                        <span>16/256GB</span>
                    </p>
                </div>

                <form action="">
                    {{-- color --}}
                    <div class="select-color">
                        <div class="title">
                            <strong>Chọn màu :</strong>
                        </div>
                        <p class="btn btn-success color-item " data-original-title="+0₫">
                            <input type="hidden" name="clor" value="vàng">
                        </p>
                        <p class="btn btn-success color-item "></p>
                        <p class="btn btn-success color-item "></p>
                        <p class="btn btn-success color-item "></p>
                    </div>

                    {{-- status --}}
                    <div class="select-status">
                        <div class="title">
                            <strong>Tình trạng :</strong>
                        </div>
                        <span class="">Còn hàng</span>
                    </div>
                    {{-- End detail selection --}}

                </form>

                <div class="products-order">
                    <button type="button" class="btn btn-primary btn_addToCart" data-code="{{ $product[0]->code }}"
                        id="liveToastBtn" style="padding: 0; border: none; width: 50%;">
                        <div class="add_to_cart" style="background-color: #795548; width: 100%;pointer-events:none;">
                            <i class="fa-solid fa-cart-shopping add_to_cart_items"></i>

                            <div class="">
                                <span class="addToCart">Thêm Giỏ Hàng</span>
                                <br>
                                <span>Cho vào giỏ hàng</span>
                            </div>
                        </div>
                    </button>
                    {{-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> --}}

                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                            style="background-color: #fff">
                            <div class="toast-header">
                                <img src="" class="rounded me-2" alt="">
                                <strong class="me-auto">Notification</strong>
                                <small>11 mins ago</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Thêm sản phẩm thành công
                            </div>
                        </div>
                    </div>

                    <div class="add_to_cart" style="background-color: green;">
                        <i class="fa-solid fa-cart-shopping add_to_cart_items"></i>

                        <div class="">
                            <span>Mua ngay</span>
                            <br>
                            <span>Giao hàng toàn quốc</span>
                        </div>
                    </div>
                </div>

                <div class="place-order" style="margin-top: 24px">
                    <form action="" method="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control bg-danger" value="Đặt ngay" style="color: #fff">
                        </div>
                    </form>
                </div>

                {{-- promotion --}}
                <div class="promotion" style="margin-top: 36px">
                    <label class="promotion-title">Khuyến mãi</label>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
                    <p class="promotion-detail">
                        Trợ giá mua củ sạc nhanh 20W PD chính hãng chỉ 250k
                    </p>
                </div>

            </div>

            <div class="col-3">
                <div class="extra-products" style="margin: 4px 0 0 0">
                    <div class="extra-products-title">
                        <h5>Có thể bạn quan tâm</h5>
                    </div>

                    <div class="products-item">

                        <div class="products-item_image">
                            <a href="#" class="nav-link">
                                <img class="products-item_img"
                                    src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                    alt="">
                            </a>
                        </div>

                        <div class="products-item_info">
                            <a href="" class="nav-link">
                                <h3 class="products-item_name">
                                    Xiaomi Redmi K50
                                </h3>
                            </a>
                            <span class="products-item_price">7.350.000₫</span>
                        </div>

                    </div>

                    <div class="products-item">

                        <div class="products-item_image">
                            <a href="#" class="nav-link">
                                <img class="products-item_img"
                                    src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                    alt="">
                            </a>
                        </div>

                        <div class="products-item_info">
                            <a href="" class="nav-link">
                                <h3 class="products-item_name">
                                    Xiaomi Redmi K50
                                </h3>
                            </a>
                            <span class="products-item_price">7.350.000₫</span>
                        </div>

                    </div>

                    <div class="products-item">

                        <div class="products-item_image">
                            <a href="#" class="nav-link">
                                <img class="products-item_img"
                                    src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                    alt="">
                            </a>
                        </div>

                        <div class="products-item_info">
                            <a href="" class="nav-link">
                                <h3 class="products-item_name">
                                    Xiaomi Redmi K50
                                </h3>
                            </a>
                            <span class="products-item_price">7.350.000₫</span>
                        </div>

                    </div>

                    <div class="products-item">

                        <div class="products-item_image">
                            <a href="#" class="nav-link">
                                <img class="products-item_img"
                                    src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                    alt="">
                            </a>
                        </div>

                        <div class="products-item_info">
                            <a href="" class="nav-link">
                                <h3 class="products-item_name">
                                    Xiaomi Redmi K50
                                </h3>
                            </a>
                            <span class="products-item_price">7.350.000₫</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="table-title">Thông số kỹ thuật</h5>
                            <div class="table-box">

                                {!! $product[0]->detail !!}

                            </div>
                            <div class="d-flex justify-content-center ">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Xem thông tin chi tiết
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 50px;">
                                    <div class="modal-dialog" style="max-width: 700px !important">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">THÔNG SỐ KĨ THUẬT</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body compare_table" style="height: 550px !important">
                                                {!! $product[0]->detail !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">

                            <div class="products-item">
                                <div class="products-item_image">
                                    <a href="#" class="nav-link">
                                        <img class="products-item_img"
                                            src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                            alt="">
                                    </a>
                                </div>

                                <div class="products-item_info">
                                    <a href="" class="nav-link">
                                        <h3 class="products-item_name">
                                            Xiaomi Redmi K50
                                        </h3>
                                    </a>
                                    <span class="products-item_price">7.350.000₫</span>
                                    <br>
                                    <a href="#" class="btn btn-outline-danger btn-compare">So sánh chi tiết</a>
                                </div>
                            </div>

                            <div class="products-item">
                                <div class="products-item_image">
                                    <a href="#" class="nav-link">
                                        <img class="products-item_img"
                                            src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                            alt="">
                                    </a>
                                </div>

                                <div class="products-item_info">
                                    <a href="" class="nav-link">
                                        <h3 class="products-item_name">
                                            Xiaomi Redmi K50
                                        </h3>
                                    </a>
                                    <span class="products-item_price">7.350.000₫</span>
                                    <br>
                                    <a href="#" class="btn btn-outline-danger btn-compare">So sánh chi tiết</a>
                                </div>
                            </div>

                            <div class="products-item">
                                <div class="products-item_image">
                                    <a href="#" class="nav-link">
                                        <img class="products-item_img"
                                            src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                            alt="">
                                    </a>
                                </div>

                                <div class="products-item_info">
                                    <a href="" class="nav-link">
                                        <h3 class="products-item_name">
                                            Xiaomi Redmi K50
                                        </h3>
                                    </a>
                                    <span class="products-item_price">7.350.000₫</span>
                                    <br>
                                    <a href="#" class="btn btn-outline-danger btn-compare">So sánh chi tiết</a>
                                </div>
                            </div>

                            <div class="products-item">
                                <div class="products-item_image">
                                    <a href="#" class="nav-link">
                                        <img class="products-item_img"
                                            src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                            alt="">
                                    </a>
                                </div>

                                <div class="products-item_info">
                                    <a href="" class="nav-link">
                                        <h3 class="products-item_name">
                                            Xiaomi Redmi K50
                                        </h3>
                                    </a>
                                    <span class="products-item_price">7.350.000₫</span>
                                    <br>
                                    <a href="#" class="btn btn-outline-danger btn-compare">So sánh chi tiết</a>
                                </div>
                            </div>

                            <div class="products-item">
                                <div class="products-item_image">
                                    <a href="#" class="nav-link">
                                        <img class="products-item_img"
                                            src="https://dienthoaihay.vn/images/products/2022/06/17/resized/neo-2-mint_1634346131jpg_1655432653.jpg"
                                            alt="">
                                    </a>
                                </div>

                                <div class="products-item_info">
                                    <a href="" class="nav-link">
                                        <h3 class="products-item_name">
                                            Xiaomi Redmi K50
                                        </h3>
                                    </a>
                                    <span class="products-item_price">7.350.000₫</span>
                                    <br>
                                    <a href="#" class="btn btn-outline-danger btn-compare">So sánh chi tiết</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 4,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        const color_item = document.querySelectorAll('.color-item');
        color_item.forEach((e, index) => {
            e.onclick = () => {
                const color = document.querySelectorAll('.color-item');
                color.forEach(item => {
                    item.classList.remove("after")
                })
                e.classList.add('after');

            }
        });

        // Bộ nhớ
        const memory_item = document.querySelectorAll('.select-memory-item');
        memory_item.forEach((e, index) => {
            e.onclick = () => {
                const memory = document.querySelectorAll('.select-memory-item');
                memory.forEach(item => {
                    item.classList.remove("memory")
                })
                e.classList.add('memory');

            }
        });

        // Notification
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
        const addToCart = document.querySelector(".addToCart")
        const product = {
                code: '',
                quantity: 0
            }
        document.querySelector(".btn_addToCart").onclick = (e) => {

            product.code = e.target.dataset.code
            product.quantity = product.quantity + 1
            console.log(JSON.stringify(product));

            localStorage.setItem('product_code', JSON.stringify(product));
        }
    </script>
@endsection
