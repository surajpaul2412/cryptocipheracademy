<!DOCTYPE html>
<html>
<head>
    <title>Crypto Cipher | Please Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image" sizes="16x16">
    <!-- plugins -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/mdb.min.css') }}">
    <!-- custom fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/custom.css') }}">
    <style>
        body{
            background-color: #1d1b27;
            height: 100vh;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <section class="bg-theme">
        <div class="row m-0">
            <div class="col-md-6 py-2 media-pl-5">
                <a href="{{url('/')}}">
                    <img src="{{asset('assets/frontend/img/logo.png')}}" style="margin-top: 48px !important;">
                </a>
                <h2 class="bold font-35 text-white pt-5">Get Started Your Website</h2>
                <h6 class="text-white">Welcome, Please Login To Your Account</h6>
                <form class="pt-5 max-width-500 text-grey" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="md-form border input-pad">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="label-pad" for="email">E-mail</label>
                    </div>
                      <!-- Password -->
                    <div class="md-form border input-pad">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="label-pad" for="password">Password</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6">
                          <!-- Remember me -->
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label font-15" for="remember">Remember Me</label>
                          </div>
                        </div>
                        <div class="col-md-6 col-6">
                          <!-- Forgot password -->
                          @if (Route::has('password.request'))
                            <a class="font-15 forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                          @endif
                        </div>
                    </div>
                    <!-- Sign in button -->
                    <button class="btn ml-0 my-4 waves-effect z-depth-0 text-white login-btn" type="submit">Login</button>
                </form>
            </div>
            <div class="col-md-6 py-2 avatar" style="background:url('{{ asset('assets/backend/images/login.png') }}');background-repeat: no-repeat;background-size: 100%;overflow: hidden;">
                <img class="outerCircle" src="{{ asset('assets/backend/images/Dots.png') }}">
            </div>
        </div>
    </section>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>

</body>
</html>