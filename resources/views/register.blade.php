<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar Bungas Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('/images/with_text.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('regist/fonts/linearicons/style.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('regist/css/style.css') }}">

    <style>
        .error {
            font-size: 10px;
            color: red
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{ asset('regist/images/image-1.png') }}" alt="" class="image-1">
            <form action="{{ route('registerSave') }}" method="POST" id="formRegist">
                @csrf
                <h3>New Account?</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input name="username" type="text" value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
                </div>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input name="no_hp" type="text" value="{{ old('no_hp') }}"
                        class="form-control @error('no_hp') is-invalid @enderror" placeholder="No. Handphone" required>
                </div>
                @error('no_hp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input name="nama" type="text" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" placeholder="Name" required>
                </div>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" required>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input name="password_confirmation" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Confirm Password" required>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button>
                    <span>Register</span>
                </button>
                <p style="margin-top: 20px">Sudah punya akun? <a href="{{ route('login') }}">Login di sini.</a></p>
            </form>
            <img src="{{ asset('regist/images/image-2.png') }}" alt="" class="image-2">
        </div>

    </div>
    {{-- <script src="{{ asset('regist/js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{ asset('regist/js/main.js') }}"></script>
    <script>
        $("#formRegist").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                no_hp: {
                    required: true,
                    number: true
                },
                nama: "required",
                password: "required",
                password_confirmation: "required"

            },
            messages: {
                username: {
                    required: "Anda harus mengisi username!",
                    minlength: "Username harus lebih dari 5 huruf!"
                },
                no_hp: {
                    required: "Anda harus mengisi nomor HP!",
                    number: "Anda harus memasukkan angka!"
                },
                nama: "Anda harus memasukkan nama!",
                password: "Anda harus memasukkan password!",
                password_confirmation: "Anda harus memasukkan password konfirmasi",
            }
        });
    </script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
