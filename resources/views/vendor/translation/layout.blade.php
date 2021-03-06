<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Ministry of Finance of the Kyrgyz Republic') }}</title>
    <link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">
    <style>
        .panel{
            margin: 1.5rem auto !important;
        }
    </style>
</head>
<body>

    <div id="app">

        @include('translation::nav')
        @include('translation::notifications')

        @yield('body')

    </div>

    <script src="{{ asset('/vendor/translation/js/app.js') }}"></script>
</body>
</html>
