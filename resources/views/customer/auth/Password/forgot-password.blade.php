<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background-image: url('https://image.vtc.vn/resize/th/upload/2021/04/23/cho-8-11373235.jpg')"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu?</h1>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success text-center mt-3">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if (session('msgError'))
                                        <div class="alert alert-danger text-center mt-3">
                                            {{ session('msgError') }}
                                        </div>
                                    @endif

                                    <form class="user" action="{{ route('store.sendEmail.forgot') }}"
                                        method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user  @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}">

                                            @error('email')
                                                <span class="invalid-feedback ml-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đặt lại mật khẩu
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('store.register') }}">Tạo một tài khoản!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('store.login') }}">Đẵ có tài khoản? Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/custom_layout/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/custom_layout/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
