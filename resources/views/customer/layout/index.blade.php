<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    {{-- Jquery --}}
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

    @yield('css')

    <!-- {{-- CDN Bootstrap --}} -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap"
        rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap');
    </style>

    <link rel="stylesheet" href="{{ asset('customer/css/index.css') }}" />

    <title>@yield('ttile')</title>
</head>

<body>
    <!-- NavBar -->

    <div class="navbar-custom sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <a href="{{ route('store.home') }}" class="d-flex align-items-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfJ28zNBVMe0zS7qTP82M2WvNp_LUMM_6fNA&usqp=CAU"
                            alt="" class="nav-logo">
                        <div class="nav-name_shop ms-2">
                            <span class="name_shop">X - Shop</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <ul class="navbar-nav nav-bar">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-item_a" href="#">
                                Điện Thoại
                            </a>
                        </li>

                        <li class="nav-item cart-item">
                            <a class="nav-link nav-item_a" aria-current="page" href="#">
                                Laptop
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-item_a" href="#">
                                Máy tính bảng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-item_a" href="#">
                                Phụ kiện
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập vào sản phẩm bạn muốn tìm kiếm...">
                    </div>
                </div>

                {{-- <div class="col-lg-2"></div> --}}

                <div class="col-lg-2">
                    <ul class="navbar-nav nav-bar">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link_custom dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-file-lines"></i>
                            </a>

                            <ul class="dropdown-menu nav-item_menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item cart-item">
                            <a class="nav-link nav-link_custom" aria-current="page" href="{{ route('store.cart') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="quantity-cart">0</span>
                            </a>

                            <div class="dropdown-nav">
                                <div class="dropdown-count">
                                    Có <strong class="dropdown-count_strong">0</strong> sản phẩm trong giỏ hàng của bạn
                                </div>
                                <div class="dropdown-items">
                                </div>

                                <div class="dropdown-totals">
                                    Tổng phụ: <strong class="total_money">0₫</strong>
                                </div>

                                <div class="dropdown-btn">
                                    <a href="{{ route('store.cart') }}" class="dropdown-btn_buttom">Đi tới giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item customer_name">
                            <a class="nav-link nav-link_custom admin_name" href="#">
                                <i class="fa-solid fa-user"></i>

                            </a>
                            <div class="admin_name-dropdown d-none">
                                <a href="{{ route('customers.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('customers.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    {{-- <input type="hidden" name="_token"
                                        value="0gHkalwIcbQsMg9fQWmF3TczWs7mkDXVeEbJx4A4"> --}}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- End NavBar --}}

    <!--Start of Dropdown-->


    <!-- Slider Show -->
    @if (request()->path() == 'store')
        <div class="container slidershow_countdown">
            <div class="row" style="padding: 6px 12px">
                <!-- SliderShow -->
                <div class="col-lg-12 p-0">
                    <div class="swiper mySwiper-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/13/638092080505734826_F-C1_1200x300.png"
                                    alt="" style="width: 100%; height: 327px;">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <!-- support and incentives -->
                <div class="support">
                    <!-- Js render -->
                </div>
            </div>
        </div>
    @endif

    <!-- Content -->
    <div class="container content ">
        {{-- <form action=""> --}}
        <div class="row">
            @if (request()->path() == 'store/products')
                <div class="col-lg-2">
                    <div class="mt-2">
                        <p class="filter-title mb-2">Hãng sản xuất</p>

                        <div class="px-3">
                            <form action="" method="GET">
                                <div class="form-check">
                                    <input class="form-check-input checkBrand" type="checkbox" name="brand[]"
                                        value="all" id="brand" />
                                    <label class="form-check-label" for="brand">Tất cả</label>
                                </div>

                                @foreach ($brands as $key => $brand)
                                    <div class="form-check">
                                        <input class="form-check-input checkBrand" type="checkbox" name="brand[]"
                                            value="{{ $brand->id }}" id="{{ $brand->name }}" />
                                        <label class="form-check-label"
                                            for="{{ $brand->name }}">{{ $brand->name }}</label>
                                    </div>
                                @endforeach

                            </form>
                        </div>
                    </div>
                    {{-- </form> --}}

                    <form method="GET" action="">
                        <div class="mt-4">
                            <p class="filter-title mb-2">Mức Giá</p>

                            <div class="px-3">
                                <div class="form-check">
                                    <input class="form-check-input checkAll" checked type="checkbox" name="price[]"
                                        value="all" id="check-price-all" />
                                    <label class="form-check-label" for="check-price-all">Tất cả</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input selectedId" type="checkbox" name="price[]"
                                        value="2" id="price_2" />
                                    <label class="form-check-label" for="price_2">Dưới 2 triệu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input selectedId" type="checkbox" name="price[]"
                                        value="3" id="price_2-4" />
                                    <label class="form-check-label" for="price_2-4">Từ 2 - 4 triệu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input selectedId" type="checkbox" name="price[]"
                                        value="4" id="price_4-7" />
                                    <label class="form-check-label" for="price_4-7">Từ 4 - 7 triệu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input selectedId" type="checkbox" name="price[]"
                                        value="5" id="price_7-13" />
                                    <label class="form-check-label" for="price_7-13">Từ 7 - 13 triệu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input selectedId" type="checkbox" name="price[]"
                                        value="6" id="price_13" />
                                    <label class="form-check-label" for="price_13">Trên 13 triệu</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            {{-- Render Product --}}
            @if (request()->path() == 'store/products')
                <div class="col-lg-10">
                    @yield('content-product')
                </div>
            @else
                <div class="col-lg-12">
                    @yield('content-product')
                </div>
            @endif
        </div>

    </div>

    <!-- footer -->
    @if (request()->path() != 'store/payment' &&
            request()->path() != 'store/cart' &&
            request()->path() != 'store/orderSuccess')
        <footer class="mt-4 py-4" style="background-color: #ef0000; color: white">
            <div class="container">
                <div class="row">
                    <div class="col-3 footer-colum">
                        <h6>Về chúng tôi</h6>

                        <div class="column-list d-flex gap-3 flex-column">
                            <a href="" class="nav-link">Tin tức</a>
                            <a href="" class="nav-link">Giới thiệu</a>
                            <a href="" class="nav-link">Tuyển dụng</a>
                            <a href="" class="nav-link">Hệ thống đại lý</a>
                            <a href="" class="nav-link">Chính sách tích điểm</a>
                        </div>
                    </div>

                    <!-- Hỗ trợ khách hàng -->
                    <div class="col-3 footer-colum">
                        <h6>Hỗ trợ khách hàng</h6>

                        <div class="column-list d-flex gap-3 flex-column">
                            <a href="" class="nav-link">Chính sách, Quy định chung</a>
                            <a href="" class="nav-link">Chính sách vận chuyển</a>
                            <a href="" class="nav-link">Chính sách bảo hàng</a>
                            <a href="" class="nav-link">Chính sách đổi trả</a>
                            <a href="" class="nav-link">Hướng dãn mua hàng online</a>
                        </div>
                    </div>

                    <!-- Hệ thống cửa hàng -->
                    <div class="col-6 footer-colum">
                        <h6>Hệ thống cửa hàng</h6>

                        <div class="column-list d-flex gap-3 flex-column ">
                            <p>
                                -
                                <span>Cơ sở 1: Số 215 Giáp Nhất, Nhân Chính, Thanh Xuân, Hà Nội</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif


    <!-- CDN Fontawesome -->
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="{{ asset('customer/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    @yield('js')


    <script>
        var swiper = new Swiper(".mySwiper-slider", {
            pagination: {
                el: ".swiper-pagination",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        // Ajax loading
        $(document).ready(function() {

            const cartArr = JSON.parse(localStorage.getItem('cart'));

            renderCart_(cartArr);

        });
    </script>

</body>

</html>
