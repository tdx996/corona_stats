@php
    $colors = [
        true => 'success',
        false =>'danger',
    ];
    $inverse = isset($inverse) ? boolval($inverse) : false;
    $colorKey = $value && $value > 0;
    if ($inverse) $colorKey = !$colorKey;
    $color = $colors[$colorKey];
@endphp

@if (isset($value))
    <small class="text-{{ $color }} {{ $class ?? '' }}">
        @if ($value >= 0)
            +{{ $value }}
        @else
            {{ $value }}
        @endif
    </small>
@else
    <small class="text-gray {{ $class ?? '' }}">
        Ni podatka
    </small>
@endif
