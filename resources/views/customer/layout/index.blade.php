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
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Encode+Sans&family=Montserrat:ital,wght@0,500;1,400&family=Pattaya&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap');
    </style>

    <link rel="stylesheet" href="{{ asset('customer/css/index.css') }}" />

    {{-- <title>@yield('ttile')</title> --}}
    <title>Trang chủ</title>
</head>

<body>
    <!-- NavBar -->


    <header class="header" style="display: block">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <div class="nav-logo">
                        <a class="navbar-brand" href="#">
                            <img class="nav-logo "
                                src="https://scontent.fhan2-5.fna.fbcdn.net/v/t1.15752-9/329959193_1211155973158597_5307414547449285977_n.png?_nc_cat=107&ccb=1-7&_nc_sid=ae9488&_nc_ohc=M09cjkosAYwAX8TPFhX&_nc_ht=scontent.fhan2-5.fna&oh=03_AdRhUjA_nellvbDNKY1EjGLYndIusvnquFPj2vgNZicazw&oe=640BC6AA"
                                alt="">
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- @dd(request()->path == 'store' ? 'nav-active' : '') --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === '/' ? 'nav-active' : '' }}" aria-current="page" href="{{ route('store.home') }}">Home</a>
                            </li>
                            {{-- @dd(request()->path()) --}}
                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'dien-thoai' ? 'nav-active' : '' }}" aria-current="page" href="{{ route('store.mobile') }}">Điện thoại</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() ==='bai-viet' ? 'nav-active' : '' }}" aria-current="page" href="{{ route('store.list.posts') }}">Bài viết</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'Laptop' ? 'nav-active' : '' }}" aria-current="page" href="#">Laptop</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'phu kien' ? 'nav-active' : '' }}" aria-current="page" href="#">Phụ kiện</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav--icon">
                        <section class="search">
                            <div class="box-nav_icon">
                                <i class="fa-solid fa-magnifying-glass icon"></i>
                            </div>

                            <div class="search-box">
                                <div class="container ">
                                    <form action="">
                                        <div class="d-flex container-search ">
                                            <input class="search-box__input" type="text" placeholder="Search">
                                            <button class="search-box__btn">Submit</button>
                                            <div class="close__input">
                                                <i class="fas fa-times close-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <section class="cart">
                            <div class="box-nav_icon">
                                <a href="" class="nav-icon_link" style="color: #666">
                                    <i class="fa-solid fa-cart-shopping icon"></i>
                                </a>

                                <span class="cart_total">4</span>
                            </div>

                            <ul class="container-cart pb-2">
                                <li class="cart-item justify-content-center">
                                    <p class="mb-0 cart-title">Có <small class="cart-title_total">4</small> sản phẩm
                                        trong giỏ hàng</p>
                                </li>
                                <li class="cart-item">
                                    <img src="https://res.cloudinary.com/dizwixa7c/image/upload/v1675878779/duan_laravel/Products/piha6kcgfhz9uy51mjnm.jpg"
                                        alt="" class="cart-link_image">

                                    <a href="" class="cart-link cart-link_name">
                                        <span class="cart-name">Samsung Galaxy Tab S6 Lite 2022</span>
                                    </a>

                                    <span class="cart-link cart-link_quantity">1</span>

                                </li>

                                <li class="cart-item">
                                    <img src="https://res.cloudinary.com/dizwixa7c/image/upload/v1675878779/duan_laravel/Products/piha6kcgfhz9uy51mjnm.jpg"
                                        alt="" class="cart-link_image">

                                    <a href="" class="cart-link cart-link_name">
                                        <span class="cart-name">Samsung Galaxy Tab S6 Lite 2022</span>
                                    </a>

                                    <span class="cart-link cart-link_quantity">1</span>

                                </li>
                            </ul>
                        </section>

                        <section class="login">
                            <div class="box-nav_icon">
                                <i class="fa-solid fa-user icon"></i>
                            </div>

                            <ul class="container-login">
                                <li class="login-item">
                                    <a href="{{ route('store.login') }}" class="login-link">Login</a>
                                </li>

                                <li class="login-item">
                                    <a href="" class="login-link">Tạo tài khoản</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    {{-- End NavBar --}}

    <main class="main-wrapper">

        <!-- Slider Show -->
        @if (request()->path() == 'store')
            <div class="container-fluid mt-1">
                <div class="row" style="">
                    <div class="col-lg-12 px-0">
                        <div class="swiper mySwiper-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://shopdunk.com/images/thumbs/0011623_banner PC valentine (1).jpeg"
                                        alt="" class="slider_image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://shopdunk.com/images/thumbs/0011621_Banner PC (2) (1).png"
                                        alt="" class="slider_image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://shopdunk.com/images/thumbs/0011615_banner PC iphone 14 Pro Max (9).jpeg"
                                        alt="" class="slider_image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://shopdunk.com/images/thumbs/0011626_Banner PC (29).png"
                                        alt="" class="slider_image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://shopdunk.com/images/thumbs/0011613_banner PC ipad gen 9 (2).jpeg"
                                        alt="" class="slider_image">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Content -->
        @yield('content-product')

    </main>


        {{-- Footer --}}
        <footer class="footer">
            <div class="container">
                <ul class="row footer-item">
                    <li class="col-lg-4">
                        <h5 class="footer-title">thông tin cửa hàng</h5>
                        <p class="footer-link">Địa chỉ: 60 29th Street Sanfrancisco, CA 99110 507 UNICON TRADED CENTER
                            UNITED States of Americal
                        </p>
                        <p class="footer-link">Điện thoại: (+00) 123 666 888 </p>
                        <span class="footer-link">Email: Phamtuan19hd@gmail.com </span>
                    </li>

                    <li class="col-lg-2">
                    </li>

                    <li class="col-lg-3">
                        <h5 class="footer-title">Hướng dẫn mua online</h5>
                        <div class="p-info">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a class="footer-link" href="">liên hệ với chúng tôi</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Tin khuyến mãi</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Hướng dẫn mua trả góp</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Chính sách trả góp</a></p>
                        </div>
                    </li>

                    <li class="col-lg-3">
                        <h5 class="footer-title">Hệ thống cửa hàng</h5>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Chính sách đổi trả</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Hệ thống bảo hành</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Giới thiệu máy đổi trả</a></p>
                        </div>
                        <div class="p-info footer-link">
                            <i class="fas fa-chevron-right icon-right"></i>
                            <p><a href="">Kiểm tra hàng Apple chính hãng</a></p>
                        </div>
                    </li>
                    {{-- <li class="col-lg-4">
                        <h5 class="footer-title">Latest News</h5>
                        <div class="news-item">
                            <img class="news-img"
                                src="https://tmbidigitalassetsazure.blob.core.windows.net/rms3-prod/attachments/37/1200x1200/Chicken-Pizza_exps30800_FM143298B03_11_8bC_RMS.jpg"
                                alt="">
                            <div class="news-text">
                                <h5 class="footer-date">January 18 12 2022</h5>
                                <p>Anyways REPS is a NYC arency repres enting photographers</p>
                            </div>
                        </div>
                        <div class="news-item">
                            <img class="news-img"
                                src="https://chianui.vn/wp-content/uploads/2019/06/B%C3%92-2-T%E1%BA%A6NG_resize_min-800x800.jpg"
                                alt="">
                            <div class="news-text">
                                <h5 class="footer-date">December 13 2 2022</h5>
                                <p>Unas risus suscript lorem issum dolor sit amet lore risus suscript </p>
                            </div>
                        </div>
                    </li> --}}
                    <p class="copyright">@Copyright Phạm Tuấn Developer</p>
                </ul>
            </div>
        </footer>
        <section id="loading" style="display: none;"></section>


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
        // $(document).ready(function() {

        //     const cartArr = JSON.parse(localStorage.getItem('cart'));

        //     renderCart_(cartArr);

        //     $(".box-nav_icon").click(function() {
        //         $(".search-box").addClass('search-active');
        //     })

        //     $(".close-icon").click(function() {
        //         $(".search-box").removeClass('search-active');
        //     })
        // });


    </script>

</body>

</html>
