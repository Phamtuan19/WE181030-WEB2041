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
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-header p-0 flex-column">
        <div class="navbar nav-c1">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <!-- logo -->
                    <div class="d-flex gap-3 align-items-center">
                        <div class="">
                            <a class="navbar-brand" href="#">
                                <img src="https://dienthoaihay.vn/images/config/logo-dth_1630379348.png" alt=""
                                    class="navbar_image" />
                                <!-- <img src="https://dienthoaihay.vn/images/config/logo-dth_1592615391.png" alt=""> -->
                            </a>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="form-search">
                        <input type="text" name="keywords-search" class="form-control keywords-search"
                            placeholder="Tìm kiếm sản phẩm ..." />
                        <i class="fa-solid fa-magnifying-glass icon-search"></i>
                    </div>

                    <!--  -->
                    <div class="">
                        <ul class="navbar-nav" style="gap: 0 12px">
                            <li class="nav-item nav-post">
                                <a class="nav-link payment" aria-current="" href="#" title="Thanh toán">
                                    <i class="fa-solid fa-file-invoice-dollar"></i>
                                </a>
                            </li>

                            <!-- Danh mục bài viết -->
                            <li class="nav-item">
                                <a class="nav-link posts" href="#" title="Bài viết">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cart-title cart-shopping" href="#" title="giỏ hàng">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link user" href="#" title="Tài khoản">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-c2">
            <div class="container nav-c2_box">
                <div class="nav-item cate-link nav-c2_item">
                    <!-- render js -->
                </div>
            </div>
        </div>
    </nav>
    {{-- End NavBar --}}
    
    <!-- Slider Show -->
    @if (request()->id == false && request()->name == false)
        <div class="container slidershow_countdown">
            <div class="row" style="padding: 0 12px">
                <!-- SliderShow -->
                <div class="col-12 p-0">
                    <div class="navbar flex-column owl-carousel-slider owl-carousel owl-theme">
                        <div class="sliderShow" style="display: inline-block; width: 100%">
                            <a href="#" class="sliderShow-link">
                                <img class="sliderShow_img"
                                    src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/12/15/638066662143788648_F-C1_1200x300.png"
                                    alt="" />
                            </a>
                        </div>
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
    <div class="container content " >
        {{-- Render Product --}}
        @yield('content-product')

        <!-- Ưu đã thanh toán -->
        {{-- <div class="incentives">
            <div class="product-title px-2 d-flex justify-content-between">
                <h2>Ưu đãi khi thanh toán</h2>
            </div>

            <div class="incentives-banner_content px-2">
                <div class="row">
                    <div class="col-3">
                        <a href="#" class="nav-link incentives_image">
                            <img class="incentives_img"
                                src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/evo-banner-hp.png"
                                alt="" />
                        </a>
                    </div>

                    <div class="col-3">
                        <a href="#" class="nav-link incentives_image">
                            <img class="incentives_img"
                                src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/800-400-max.png"
                                alt="" />
                        </a>
                    </div>

                    <div class="col-3">
                        <a href="#" class="nav-link incentives_image">
                            <img class="incentives_img"
                                src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/uu-dai-thanh-toan-homecredit-normal-new.jpg"
                                alt="" />
                        </a>
                    </div>

                    <div class="col-3">
                        <a href="#" class="nav-link incentives_image">
                            <img class="incentives_img"
                                src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/uu-dai-thanh-toan-jcb-normal-new.jpg"
                                alt="" />
                        </a>
                    </div>

                </div>
            </div>
        </div> --}}
    </div>

    <!-- footer -->
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


    <!-- {{-- CDN Fontawesome --}} -->
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- <script src="{{ asset('customer/js/index.js') }}"></script> --}}

    @yield('js')

</body>

</html>
