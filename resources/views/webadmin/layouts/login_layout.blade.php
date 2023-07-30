<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('webadmin/img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>Laravel 7 - Admin Login</title>
    @include('webadmin.layouts.partials.css_scripts')
</head>
<body class="body-bg-full profile-page" style="background-image: url({{ asset('webadmin/img/login-bg.jpg')}}) ">
    <div class="upb_bg_overlay"></div>
    <div id="wrapper" class="row wrapper">        
        @yield('content')
    </div>
    @include('webadmin.layouts.partials.login_js_scripts')
</body>
</html>