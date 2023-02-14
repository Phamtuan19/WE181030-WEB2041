{{-- @dd(in_array($mobileCategories, json_decode($mobile->category_id, true)))

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


                <div class="collapse navbar-collapse navbar-blog" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link_a {{ request()->path() === '/' ? 'nav-active' : '' }}"
                                aria-current="page" href="{{ route('store.home') }}">Home</a>
                        </li>

                        <li class="nav-item nav--item__shop">
                            <a class="nav-link nav-link_a nav-shop {{ request()->path() === 'dien-thoai' ? 'nav-active' : '' }}"
                                aria-current="page" href="{{ route('store.mobile') }}">Điện thoại</a>

                            <div class="nav--dropdown__items">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 nav--dropdown__items__brand">
                                            <p class="nav--dropdown__items-title">Hãng sản xuât</p>
                                            <ul class="items__brand">
                                                <div class="row">
                                                    @if (count($headers[0]) > 0)
                                                        @foreach ($headers[0]['brands'] as $mobile)
                                                            @if (!empty($mobile['category_id']) && in_array($headers[0]['categories_id'], json_decode($mobile['category_id'], true)))
                                                                <li class="col-lg-4 items__brand--li">
                                                                    @if ($mobile['name'] == 'Apple')
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[0]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] . ' ' }} (iPhone)

                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[0]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] }}
                                                                        </a>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </ul>
                                        </div>

                                        <div class="col-lg-4 nav--dropdown__items__image">
                                            <p class="nav--dropdown__items-title">Sản phẩm bán chạy nhất</p>
                                            <a href="{{ route('store.product', $headers[0]['code']) }}">
                                                <div class="" style="width: 100%">
                                                    <img style="width: 100%;" src="{{ $headers[0]['image_path'] }}"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item nav--item__shop">
                            <a class="nav-link nav-link_a nav-shop {{ request()->path() === 'dien-thoai' ? 'nav-active' : '' }}"
                                aria-current="page" href="{{ route('store.mobile') }}">Laptop</a>

                            <div class="nav--dropdown__items">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 nav--dropdown__items__brand">
                                            <p class="nav--dropdown__items-title">Hãng sản xuât</p>
                                            <ul class="items__brand">
                                                <div class="row">
                                                    @if (count($headers[1]) > 0)
                                                        @foreach ($headers[1]['brands'] as $mobile)
                                                            @if (!empty($mobile['category_id']) && in_array($headers[1]['categories_id'], json_decode($mobile['category_id'], true)))
                                                                <li class="col-lg-4 items__brand--li">
                                                                    @if ($mobile['name'] == 'Apple')
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[1]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] . ' ' }} (MacBook)

                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[1]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] }}
                                                                        </a>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </ul>
                                        </div>

                                        <div class="col-lg-4 nav--dropdown__items__image">
                                            <p class="nav--dropdown__items-title">Sản phẩm bán chạy nhất</p>
                                            <a href="{{ route('store.product', $headers[1]['code']) }}">
                                                <div class="" style="width: 100%">
                                                    <img style="width: 100%;" src="{{ $headers[1]['image_path'] }}"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item nav--item__tablet">
                            <a class="nav-link nav-link_a nav-shop {{ request()->path() === 'dien-thoai' ? 'nav-active' : '' }}"
                                aria-current="page" href="{{ route('store.mobile') }}">Tablet</a>

                            <div class="nav--dropdown__items">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 nav--dropdown__items__brand">
                                            <p class="nav--dropdown__items-title">Hãng sản xuât</p>
                                            <ul class="items__brand">
                                                <div class="row">
                                                    @if (count($headers[2]) > 0)
                                                        @foreach ($headers[2]['brands'] as $mobile)
                                                            @if (!empty($mobile['category_id']) && in_array($headers[2]['categories_id'], json_decode($mobile['category_id'], true)))
                                                                <li class="col-lg-4 items__brand--li">
                                                                    @if ($mobile['name'] == 'Apple')
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[2]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] . ' ' }} (iPad)

                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('store.mobile') }}?brand={{ $mobile['name'] }}&category={{ $headers[2]['categories_slug'] }}"
                                                                            target="_self" title="Apple (MacBook)">
                                                                            {{ $mobile['name'] }}
                                                                        </a>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </ul>
                                        </div>

                                        @if (!empty($headers[2]['image_path']))
                                        <div class="col-lg-4 nav--dropdown__items__image">
                                            <p class="nav--dropdown__items-title">Sản phẩm bán chạy nhất</p>
                                            <a href="{{ route('store.product', $headers[2]['code']) }}">
                                                <div class="" style="width: 100%">
                                                    <img style="width: 100%;" src="{{ $headers[2]['image_path'] }}"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item nav--item__blog">
                            <a class="nav-link nav-link_a {{ request()->path() === 'bai-viet' ? 'nav-active' : '' }}"
                                aria-current="page" href="{{ route('store.list.posts') }}">Blog</a>

                            <div class="nav--dropdown__items">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 nav--dropdown__items__brand">
                                            <p class="nav--dropdown__items-title">Hãng sản xuât</p>
                                            <ul class="items__brand">
                                                <div class="row">
                                                    @foreach ($posts as $post)
                                                        <li class="col-lg-4 items__brand--li">
                                                            <a href="{{ route('store.list.posts') }}?post={{ $post->slug }}"
                                                                target="_self" title="{{ $post->name }}">
                                                                {{ $post->name }}

                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link_a {{ request()->path() === 'Laptop' ? 'nav-active' : '' }}"
                                aria-current="page" href="#">Concact</a>
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
</header> --}}
