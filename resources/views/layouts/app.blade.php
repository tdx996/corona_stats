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

@include('shared.success')

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

<script type="text/javascript">
    var infolinks_pid = 3248125;
    var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>

@stack('scripts')

</body>
</html>
