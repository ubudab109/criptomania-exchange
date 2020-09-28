<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('common/images/favicon-32x32.png') }}">
    @yield('before-style')
    <link rel="stylesheet" href="{{ asset('newAssets/statusCss/style.css') }}">
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @if( env('APP_ENV') == 'production' && admin_settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
    {!! NoCaptcha::renderJs() !!}
    @endif
    <!-- Google Font -->
   <!--  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

    @yield('after-style')
</head>

<body id="dark">
  <header class="dark-bb">
  </header>
  <div class="error-page vh-100 d-flex justify-content-center text-center">
    <div class="my-auto">
                @yield('centralize-content')
    </div>
  </div>
<!-- jQuery 3 -->
 <script src="{{asset('newAssets/js/jquery-3.4.1.min.js')}}"></script>
 <script src="{{asset('newAssets/js/popper.min.js')}}"></script>
 <script src="{{asset('newAssets/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('newAssets/js/amcharts-core.min.js')}}"></script>
 <script src="{{asset('newAssets/js/amcharts.min.js')}}"></script>
 <script src="{{asset('newAssets/js/custom.js')}}"></script>
@yield('script')

</body>

</html>