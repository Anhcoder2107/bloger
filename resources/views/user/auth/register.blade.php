<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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
            <div class="wrap-register100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('storage/images/img-01.png')}}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Member Register
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Name" value="{{ old('email') }}" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

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
                        <input type="password" name="password" placeholder="Password" id="password" class="input100 @error('password') is-invalid @enderror" required autocomplete="current-password" onchange='check_pass();'>
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

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input type="password" name="password" placeholder="Comfirm Password" id="confirm_password" class="input100 @error('password') is-invalid @enderror" required autocomplete="current-password" onchange='check_pass();'>
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
                        <button class="login100-form-btn" id="submit" type="submit" disabled>
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-48">
                        <a class="txt2" href="/login">
                            Login your Account
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


    function check_pass() {
        if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }
</script>


<script src="js/login.js"></script>


    <!-- <div class="container" class="py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"  name="name"  class="form-control " value="{{ old('name') }}" >
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Comfirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

