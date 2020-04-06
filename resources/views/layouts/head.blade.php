<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:image" content="{{ asset('facebook_sharing.png') }}">
    <meta property="og:description" content="Vsakodnevna celostna statistika (opravljeni testi, okužbe, hospitalizirani, na intenzivni negi, smrti) epidemije COVID-19 v Sloveniji.">
    <title>
        {{ env('APP_NAME') }}
        @if (!empty($__env->yieldContent('title_suffix')))
            - @yield('title_suffix')
        @endif
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vsakodnevna celostna statistika (opravljeni testi, okužbe, hospitalizirani, na intenzivni negi, smrti) epidemije COVID-19 v Sloveniji." />
    <meta name="propeller" content="e14d1c2f5f7a40d91ab2cc76b88e9132">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-16x16.png') }}">
</head>
