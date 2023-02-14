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

        @include('customer.layout.slider')

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
</body>

</html>
