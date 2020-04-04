@include('layouts.head')

<body class="hold-transition layout-top-nav @yield('body-class')">
<div class="wrapper">

    @include('layouts.header')

    <div class="content-wrapper">

        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@if (env('GOOGLE_ANALYTICS_ID'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162518681-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
    </script>
@endif

<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '825912424423753');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=825912424423753&ev=PageView&noscript=1"/>
</noscript>

@if (env('AD_CLIENT_ID'))
    <script data-ad-client="{{ env('AD_CLIENT_ID') }}" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endif

@stack('scripts')

</body>
</html>
