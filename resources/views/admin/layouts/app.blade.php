<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title-page') {{ __('Ministry of Finance of the Kyrgyz Republic') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ env('APP_DESCRIPTION') }}" name="{{ env('APP_AUTHOR') }}" />
    <link rel="shortcut icon" href="{{ asset('front/images/Logo.svg') }}">

    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @if(session('theme') == 'dark')
        <link href="{{ asset('admin/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    @else
        <link href="{{ asset('admin/css/app-modern.min.css ') }}" rel="stylesheet" type="text/css" id="light-style" />
    @endif
    @stack('head-scripts')

</head>

<body class="loading" data-layout="detached"
      data-layout-config='{
      "leftSidebarCondensed":false,
      "darkMode":@if(session('theme') == 'dark')true @else false @endif,
      "showRightSidebarOnStart": true}'
    >

    @include('admin.includes.nav')

    <div class="container-fluid">

        <div class="wrapper">

            @include('admin.includes.sidebar')

            <div class="content-page">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                @yield('page-information')
                            </div>
                        </div>
                    </div>

                    @yield('content')

                </div>

                @include('admin.layouts.footer')

            </div>
        </div>
    </div>

    @stack('modal')

    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @if(request()->routeIs('dashboard'))
        <script src="{{ asset('admin/js/vendor/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dashboard.js ') }}"></script>
    @endif
    @stack('footer-scripts')
</body>
</html>
