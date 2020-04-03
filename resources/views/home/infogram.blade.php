@extends('layouts.app')

@section('title_suffix', 'Infogram')

@section('body-class', 'fullscreen')

@section('content')
    <div class="infogram-embed" data-id="af62eced-fa84-40e9-a54b-83f954c86e7e" data-type="interactive" data-title="Okužbe v Sloveniji"></div>
@endsection

@push('scripts')
<script>
    !function (e, i, n, s) {
        var t = "InfogramEmbeds", d = e.getElementsByTagName("script")[0];
        if (window[t] && window[t].initialized) window[t].process && window[t].process(); else if (!e.getElementById(n)) {
            var o = e.createElement("script");
            o.async = 1, o.id = n, o.src = "https://e.infogram.com/js/dist/embed-loader-min.js", d.parentNode.insertBefore(o, d)
        }
    }(document, 0, "infogram-async");
</script>
@endpush
