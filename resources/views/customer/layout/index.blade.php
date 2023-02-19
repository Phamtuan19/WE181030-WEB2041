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

    <main class="main-wrapper">
        <!-- NavBar -->
        @include('customer.layout.header')
        {{-- End NavBar --}}

        <!-- Slider Show -->
        @if (request()->path() == 'store')
            <div class="container mt-4">
                <div class="row" style="">
                    <div class="col-lg-12">
                        <div class="swiper mySwiper-slider">
                            <div class="swiper-wrapper" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                                <div class="swiper-slide">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/2/1/638108673553993107_F-C1_1200x300@2x.png"
                                        alt="" class="slider_image"
                                        style="width: 100%; height: 450px; cursor: pointer; border-radius: 5px">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @include('customer.layout.support_information')

        <main class="main-wrapper">
            <!-- Content -->
            @yield('content-product')
        </main>

        @include('customer.layout.footer')

        <section id="loading" style="display: none;"></section>

    </main>

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

    <script>
        $('.icon-search').click(function() {
            $(".search-box").attr("style", "display:block");
            $(".search-box__input").val('')
        })

        $(".close__input").click(function() {
            $(".search-box").attr("style", "display:none !important");
            $(".search-box__input").val('')
            $(".search-box__ul").html('');
        })

        let url = window.location.origin
        console.log(url);
        function renderSearch(data, url) {
            let value = data.map(function(e) {
                return `
                    <li class="ais-Hits-item">
                        <a href="${url}${e.code}" class="item-js"
                            queryid="434a666f18d7aa46f3ee04f87b1b5772" objid="42725" position="1">
                            <div class="pr-item">
                                <div class="pr-item__img m-r-8"> <img
                                        src="${e.avatar}"
                                        alt="iPhone 14 Pro Max 128GB"> </div>
                                <div class="pr-item__info">

                                    <h3 class="pr-item__name m-b-4">${e.name}</h3>
                                    <div class="pr-item__price">
                                        ${formatCurrency(e.promotion_price)}
                                        <del class="original deal">
                                            ${formatCurrency(e.price)}
                                        </del>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                `;
            })
            $(".search-box__ul").html(value);
        }

        console.log(window.location.origin + "/api/store/search?storeSearch=");
        $(document).ready(function() {

            $(".search-box__input").keyup(function() {

                $(".fs-suggest-product").css("display","block");

                $.ajax({
                    url: window.location.origin + "/api/store/search?storeSearch=" + $(this).val(),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if(data.length > 0) {
                            renderSearch(data)
                        }else {
                            $(".search-box__ul").html('<h5 style="text-align:center">Sản phẩm không tồn tại</h5>');
                        }
                    },
                });

            });
        })
    </script>

</body>

</html>
