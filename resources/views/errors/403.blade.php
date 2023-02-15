<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin . X-shop</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/custom_layout/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/custom_layout/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    {{-- css custom layout --}}
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/customIndex.css') }}">

    @yield('link')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">Bạn không có quyền truy cập</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        </div>
    </div>
</body>
