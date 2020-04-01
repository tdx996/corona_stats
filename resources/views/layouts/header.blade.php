<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('icon.png') }}" alt="Koronavirus Slovenija Logo" class="brand-image" style="opacity: .8">
            <span class="brand-text">
                    {{ env('APP_NAME') }}
                </span>
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="mailto:{{ env('INFO_EMAIL') }}">
                        <span class="mr-1 text-sm text-black">
                            @lang('messages.report_to_us')
                        </span>
                    <i class="fas fa-envelope"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
