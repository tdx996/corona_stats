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
                    <a href="{{ route('infogram') }}" class="nav-link bg-orange {{ \Request::is('infogram*') ? 'active' : '' }}">
                        <i class="fas fa-info mr-1"></i>
                        Infogram
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript: void(0)" id="subscribe" class="nav-link bg-danger">
                        <i class="fas fa-bell mr-1"></i>
                        Obveščaj me
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://gogetfunding.com/comprehensive-statistics-on-covid-19-in-slovenia/" target="_blank" class="nav-link bg-dark {{ \Request::is('kontakt*') ? 'active' : '' }}">
                        <i class="fas fa-coins mr-1"></i>
                        Doniraj
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{!! Form::open(['route' => ['subscribers.create'], 'class' => 'modal fade show', 'id' => 'modal_subscribe']) !!}
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                Obveščaj me o novostih
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-center bg-gray p-2 rounded">
                Te zanimajo najnovejši statistični podatki o virusu? <br> Vpiši svoj email in obveščen boš ob vsaki novosti!
            </p>
            <div class="form-group">
                {!! Form::label('email', 'Vaš email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
                <p class="text-sm">
                    Ne pošiljamo novic ali spam pošte, le najnovejše podatke.
                </p>
            </div>
        </div>
        <div class="modal-footer text-right">
            <button type="submit" class="btn btn-primary">
                Naroči se
            </button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#subscribe').on('click', function() {
                $('#modal_subscribe').modal('show')
            })
        });
    </script>
@endpush
