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

@if (env('AD_CLIENT_ID'))
    <script data-ad-client="{{ env('AD_CLIENT_ID') }}" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endif

@stack('scripts')

</body>
</html>
