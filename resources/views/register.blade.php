<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar Bungas Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('/images/with_text.png') }}">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('regist/fonts/linearicons/style.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('regist/css/style.css') }}">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{ asset('regist/images/image-1.png') }}" alt="" class="image-1">
            <form action="">
                <h3>New Account?</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input name="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input name="no_hp" type="text" class="form-control" placeholder="No. Handphone">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input name="nama" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input name="password_confirmation" type="password" class="form-control"
                        placeholder="Confirm Password">
                </div>
                <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                <button>
                    <span>Register</span>
                </button>
                <p style="margin-top: 20px">Sudah punya akun? <a href="{{ route('login') }}">Login di sini.</a></p>
            </form>
            <img src="{{ asset('regist/images/image-2.png') }}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{ asset('regist/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('regist/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
