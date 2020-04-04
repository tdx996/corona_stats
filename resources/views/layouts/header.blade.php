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
                <li class="nav-item text-olive">
                    <a href="{{ route('questions.index') }}" class="nav-link bg-yellow {{ \Request::is('debata-o-koronavirusu*') ? 'active' : '' }}">
                        <i class="fas fa-comments mr-1"></i>
                        Debata o Koronavirusu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('infogram') }}" class="nav-link {{ \Request::is('infogram*') ? 'active' : '' }}">
                        <i class="fas fa-info mr-1"></i>
                        Infogram
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ \Request::is('kontakt*') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-1"></i>
                        Poročaj nam
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
