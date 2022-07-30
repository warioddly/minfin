<!DOCTYPE html>
<html lang="{{ session('locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('front/images/logo/Logo1.png') }}">
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/css/app.css ') }}">
    <link rel="stylesheet" href="{{ asset('front/css/hc-offcanvas-nav.css') }}">
    <script src="{{ asset('front/js/hc-offcanvas-nav.js?ver=6.1.5') }}"></script>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @stack('head-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('content-title')</title>
    <!-- Yandex.Metrika counter -->
    <script src="https://mc.yandex.ru/metrika/watch.js" type="text/javascript" ></script>
    <script type="text/javascript" >
        try {
            var yaCounter89438673 = new Ya.Metrika({
                id:89438673,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        } catch(e) { }
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/89438673" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
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


{{--<!-- Carrot quest BEGIN -->--}}
{{--<script type="text/javascript">--}}
{{--    !function(){function t(t,e){return function(){window.carrotquestasync.push(t,arguments)}}if("undefined"==typeof carrotquest){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://cdn.carrotquest.app/api.min.js",document.getElementsByTagName("head")[0].appendChild(e),window.carrotquest={},window.carrotquestasync=[],carrotquest.settings={};for(var n=["connect","track","identify","auth","onReady","addCallback","removeCallback","trackMessageInteraction"],a=0;a<n.length;a++)carrotquest[n[a]]=t(n[a])}}(),carrotquest.connect("51529-b5863720507e65e56c0d03d72d");--}}
{{--</script>--}}
{{--<!-- Carrot quest END -->--}}

<script>
    var botmanWidget = {
        frameEndpoint: '{{ route('botmenChat') }}',
        title:'Минфин чат-бот',
        introMessage: 'Здраствуйте! Чем я могу вам помочь?',
        placeholderText: '{{ __('Enter your message') }}',
        aboutText: 'МИНИСТЕРСТВО ФИНАНСОВ КР',
        aboutLink: 'https://minfin.24mycrm.com/',
        headerTextColor: '#fff',
        mainColor:'#0b4678',
        bubbleBackground:'#0b4678',
    };

</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>
</html>
