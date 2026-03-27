<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Crypto Cipher | CMS</title>
    <link rel="icon" href="{{asset('assets/backend/images/fav.png')}}" type="image" sizes="16x16">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <!-- Favicon-->

    <!-- icon-pack -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/plugins/akvizuals/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/backend/plugins/akvizuals/node-waves/waves.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('assets/backend/plugins/akvizuals/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- select -->
    <link href="{{ asset('assets/backend/plugins/akvizuals/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ asset('assets/backend/plugins/akvizuals/morrisjs/morris.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/backend/css/themes/all-themes.css') }}" rel="stylesheet" />
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- custom css -->
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" />
    <meta name="google-site-verification" content="0U-h6zOkdjXdokVXza1kzxJD9Q43mw9vje1bhV6fzDU" />
    <link rel="canonical" href="https://www.cryptocipheracademy.com/" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Top Bar -->
    <nav class="navbar media-min-d-none">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"></a>
            </div>
        </div>
    </nav>
    <!-- Left Sidebar -->
    @include('layouts.backend.partial.sidebar')
    <section class="content" style="background-color: #1d1b27;">
        <div class="container-fluid bg-white py-3 bold" align="center" style="border-top-left-radius: 35px;">
            <a href="{{url('/admin/dashboard')}}" class="px-0">
                <img src="{{asset('assets/backend/images/logo')}}" width="150px">
            </a>
        </div>
        <div class="bg-white">
            <div class="container-fluid media-min-border-radius" style="background-color: #e9e9e9;">
                <div class="block-header">
                    <h2></h2>
                </div>
                <!-- Widgets -->
                @yield('content')
            </div>
        </div>
    </section>
<!-- Jquery Core Js -->
    <script src="{{ asset('assets/backend/plugins/akvizuals/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/backend/plugins/akvizuals/bootstrap/js/bootstrap.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/akvizuals/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/akvizuals/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/akvizuals/node-waves/waves.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/backend/js/admin.js') }}"></script>
    <!-- Demo Js -->
    <script src="{{ asset('assets/backend/js/demo.js') }}"></script>
    <!-- upload image -->
    <script src="{{ asset('assets/backend/js/uploadImage.js') }}"></script>
    @yield('script')
</body>
</html>
