<!DOCTYPE html>
<html>
<head>
    <title>Crypto Cipher | Register</title>
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
        .input-pad{
            padding: 10px 40px;
        }
        .md-form label{
            top: -9px;
        }
        .btn{
            margin: 0;
        }
    </style>
</head>
<body>
    <section class="bg-theme">
        <div class="row m-0">
            <div class="col-md-6 py-2 media-pl-5">
                <a href="{{url('/')}}">
                    <img src="{{asset('assets/frontend/img/logo.png')}}" style="margin-top: 45px !important;">
                </a>
                <h2 class="bold font-35 text-white pt-5">Get Started Your Website</h2>
                <h6 class="text-white">Welcome, Please register here</h6>
                <form class="max-width-500 text-grey" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
<div class="md-form border input-pad">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" required readonly onfocus="this.removeAttribute('readonly');">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="name" class="label-pad">{{ __('Name') }}</label>
</div>
<!-- Email -->
<div class="md-form border input-pad">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" required readonly onfocus="this.removeAttribute('readonly');">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="email" class="label-pad">{{ __('E-Mail Address') }}</label>
</div>
<!-- Password -->
<div class="md-form border input-pad">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password" class="label-pad">{{ __('Password') }}</label>
</div>
<!-- Confirm Password -->
<div class="md-form border input-pad">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password-confirm" class="label-pad">{{ __('Confirm Password') }}</label>
</div>
                    <!-- Sign in button -->
                    <button class="btn ml-0 waves-effect z-depth-0 text-white login-btn" type="submit">Register</button>
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