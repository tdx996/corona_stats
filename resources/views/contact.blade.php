@extends('layouts.app')

@section('title_suffix', 'Kontakt')

@section('content')
    {!! Form::open(['route' => 'contact', 'method' => 'POST', 'class' => 'card']) !!}
        <div class="card-header">
            Kontakt
        </div>

        <div class="card-body">
            @include('shared.errors')

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check mr-1"></i>
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="form-group">
                <label for="full_name">Vaše ime</label>
                {!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Janez Novak', 'required' => true]) !!}
            </div>
            <div class="form-group">
                <label for="email">Vaša E-pošta</label>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'janez.novak@example.com', 'required' => true]) !!}
            </div>
            <div class="form-group">
                <label for="content">Vsebina</label>
                {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => true]) !!}
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Pošlji" />
        </div>
    {!! Form::close() !!}
@endsection
