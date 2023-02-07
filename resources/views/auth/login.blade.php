<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    {{-- vendor/fontawesome-free/css/all.min.css --}}
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
        <div class="row justify-content-center" style="position: relative;">

            <div class="col-xl-10 col-lg-12 col-md-9" style="position: absolute; top: 0; transform: translateY(35%);">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background: url(https://petmaster.vn/petroom/wp-content/uploads/2020/03/thanh-bieu-cam-cho-husky.jpg); background-position: center; background-size: cover;">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập trang quản trị</h1>
                                    </div>

                                    @if (session('msg'))
                                        <div class="alert alert-success text-center mt-3">
                                            {{ session('msg') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        {{-- Email --}}
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" name="email" value="{{ old('username') ? old('username')  : 'phamtuan19hd@gmail.com'}}"
                                                placeholder="Nhập địa chỉ email..."
                                                style="padding: 1.5rem 1rem; border-radius: 1rem;">
                                            @error('email')
                                                <span class="invalid-feedback ml-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Password --}}
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" name="password" value="admin1234" placeholder="Nhập mật khẩu"
                                                style="padding: 1.5rem 1rem; border-radius: 1rem;">

                                            @error('password')
                                                <span class="invalid-feedback ml-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ghi nhớ tài
                                                    khoản</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>

                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                        @endif
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
    {{-- vendor/jquery/jquery.min.js --}}
    <script src="{{ asset('admin/custom_layout/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/custom_layout/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/custom_layout/js/sb-admin-2.min.js') }}"></script>

    <script>
        $(".bg-login-image")
    </script>

</body>

</html>
