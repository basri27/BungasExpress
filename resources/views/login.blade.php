<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Bungas Express</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('/images/with_text.png') }}">
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('login/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('loginAction') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Login
                    </span>
                    @if ($errors->any)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show text-danger txt2" role="alert">
                                <strong>Login Failed!</strong> Invalid username or password.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif

                    <div class="wrap-input100 validate-input" data-validate = "Usernmae wajib diisi">
                        <input class="input100" type="text" name="username" placeholder="Username"
                            value="{{ old('username') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password wajib diisi">
                        <input class="input100" id="password" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    {{-- <div class="text-left">
                        <input type="checkbox" onclick="myFunction()">
                        <span class="txt1">
                            Show Password
                        </span>
                    </div> --}}

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Lupa
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-1">
                        <a class="txt2" href="{{ route('regist') }}">
                            Buat akun baru
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="text-center p-t-30">
                        <span class="txt1">Kembali ke</span>
                        <a class="txt2" href="{{ route('home') }}">
                            Beranda
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('login/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        });

        // function myFunction() {
        //     var x = document.getElementById("password");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/js/main.js') }}"></script>

</body>

</html>
