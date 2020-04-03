@php

$menu = [
    'infogram' => 'Infogram',
    'contact' => 'Pošlji nam vprašanje'
];

@endphp

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('icon.png') }}" alt="Koronavirus Slovenija Logo" class="brand-image" style="opacity: .8">
            <span class="brand-text">
                {{ env('APP_NAME') }}
            </span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                @foreach ($menu as $route => $translation)
                    <li class="nav-item">
                        <a href="{{ route($route) }}" class="nav-link">
                            {{ $translation }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
