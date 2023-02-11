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
                                <a class="nav-link nav-link_a {{ request()->path() === '/' ? 'nav-active' : '' }}"
                                    aria-current="page" href="{{ route('store.home') }}">Trang chủ</a>
                            </li>
                            {{-- @dd(request()->path()) --}}
                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'dien-thoai' ? 'nav-active' : '' }}"
                                    aria-current="page" href="{{ route('store.mobile') }}">Điện thoại</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'bai-viet' ? 'nav-active' : '' }}"
                                    aria-current="page" href="{{ route('store.list.posts') }}">Bài viết</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'Laptop' ? 'nav-active' : '' }}"
                                    aria-current="page" href="#">Laptop</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link nav-link_a {{ request()->path() === 'phu kien' ? 'nav-active' : '' }}"
                                    aria-current="page" href="#">Phụ kiện</a>
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
                                <a href="{{ route('store.cart') }}" class="nav-icon_link" style="color: #666">
                                    <i class="fa-solid fa-cart-shopping icon"></i>
                                </a>

                                <span class="cart_total">0</span>
                            </div>

                            <div class="container-cart pb-2">

                                <div class="cart-item justify-content-center" style="border-bottom: 1px solid #ccc;">
                                    <p class="mb-0 cart-title">Có <small class="cart-title_total">0</small> sản phẩm
                                        trong giỏ hàng</p>
                                </div>

                                <ul class="dropdown-items " style="padding-left: 0; z-index: 3 !important;">
                                </ul>
                            </div>
                        </section>

                        <section class="login">
                            <div class="box-nav_icon">
                                @if (Auth::guard('customers')->check())
                                    <small class="user--name">{{ Auth::guard('customers')->user()->username }}</small>
                                    <i class="fa-solid fa-caret-down"></i>
                                @else
                                    <i class="fa-solid fa-user icon"></i>
                                @endif
                            </div>

                            <ul class="container-login active">
                                @if (Auth::guard('customers')->check())
                                    <li class="login-item">
                                        <a href="{{ route('store.logout') }}" class="login-link"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('store.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li class="login-item">
                                        <a href="{{ route('store.login') }}" class="login-link">Login</a>
                                    </li>

                                    <li class="login-item">
                                        <a href="" class="login-link">Tạo tài khoản</a>
                                    </li>
                                @endif
                            </ul>
                        </section>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    {{-- End NavBar --}}

    <main class="main-wrapper">



        <!-- Content -->
        @yield('content-product')




    </main>

    @include('customer.layout.footer')

    <section id="loading" style="display: none;"></section>


    <!-- CDN Fontawesome -->
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="{{ asset('customer/js/function.js') }}"></script>
    <script src="{{ asset('customer/js/index.js') }}"></script>

    @yield('js')

</body>

</html>
