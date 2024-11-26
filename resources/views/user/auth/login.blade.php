<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../../images/icons/favicon.ico" />
    @vite(['resources/sass/app.scss'])
    @vite(['resources/sass/login.scss'])
    @vite(['resources/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
    'resources/vendor/select2/select2.min.css',
    'resources/vendor/bootstrap/css/bootstrap.min.css',
    'resources/vendor/animate/animate.css',
    'resources/vendor/select2/select2.min.css',
    'resources/images/icons/favicon.ico',
    'resources/css/util.css',
    'resources/css/main.css',
    ])
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('storage/images/img-01.png')}}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input type="password" name="password" placeholder="Password" id="password" class="input100 @error('password') is-invalid @enderror" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="/register">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

@vite(['resources/js/app.js',
    'resources/js/login.js',
    'resources/vendor/jquery/jquery-3.2.1.min.js',
    'resources/vendor/bootstrap/js/popper.js',
    'resources/vendor/bootstrap/js/bootstrap.min.js',
    'resources/vendor/select2/select2.min.js',
    'resources/vendor/tilt/tilt.jquery.min.js',
])
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })



</script>


<script src="js/login.js"></script>