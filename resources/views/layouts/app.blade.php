@include('layouts.head')

<body class="hold-transition layout-top-nav">
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

<script src="{{ asset('js/app.js') }}"></script>
@if (env('GOOGLE_ANALYTICS_ID'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162518681-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
    </script>
@endif

@yield('script')

</body>
</html>
