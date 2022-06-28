<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('front/images/logo/Logo.png') }}">
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/css/app.css ') }}">
    <link rel="stylesheet" href="{{ asset('front/css/hc-offcanvas-nav.css') }}">
    <script src="{{ asset('front/js/hc-offcanvas-nav.js?ver=6.1.5') }}"></script>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @stack('head-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('content-title')</title>
</head>
<body class="theme-default">

<div class="wrapper">
    @include('front.includes.header')

    <main>
        @yield('content')
    </main>

    @include('front.includes.footer')
</div>

<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('front/js/script.js ') }}"></script>
@stack('footer-scripts')

</body>
</html>
