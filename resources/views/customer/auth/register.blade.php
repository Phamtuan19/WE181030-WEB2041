<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/custom_layout/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/custom_layout/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"
                        style="background: url(https://nhadepso.com/wp-content/uploads/2023/02/tong-hop-50-hinh-anh-cho-husky-ngao-dep-dang-yeu-nhat_12.jpg); background-position: center; background-size: cover;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo một tài khoản !</h1>
                            </div>

                            @if (session('msg'))
                                <div class="alert alert-success text-center mt-3">
                                    {{ session('msg') }}
                                </div>
                            @endif

                            <form action="{{ route('store.postRegister') }}" method="POST" class="user">
                                @csrf

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        name="name" id="exampleFirstName" placeholder="Nhập vào tên bạn muốn ... ">

                                    @error('name')
                                        <span class="invalid-feedback ml-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" id="exampleInputEmail" placeholder="Nhập vào địa chỉ email ... ">

                                    @error('email')
                                        <span class="invalid-feedback ml-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('phone') is-invalid @enderror"
                                        name="phone" id="exampleInputEmail" placeholder="Nhập vào số điện thoại ... ">

                                    @error('phone')
                                        <span class="invalid-feedback ml-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="password">

                                        @error('password')
                                            <span class="invalid-feedback ml-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password"
                                            class="form-control form-control-user @error('confirmed') is-invalid @enderror"
                                            id="exampleRepeatPasswordConfirmed" name="password_confirmation"
                                            placeholder="Mật khẩu nhập lại ...">
                                    </div>
                                </div>
                                <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                                    Đăng ký
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('store.resetPassword') }}">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('store.login') }}">Đã có tài khoản ? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    {{-- vendor/jquery/jquery.min.js --}}
    <script src="{{ asset('admin/custom_layout/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/custom_layout/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/custom_layout/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
