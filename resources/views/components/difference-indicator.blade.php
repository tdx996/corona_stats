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

<small class="text-{{ $color }} {{ $class ?? '' }}">
    @if (isset($value))
        @if ($value >= 0)
            +{{ $value }}
        @else
            {{ $value }}
        @endif
    @else
        Ni podatka
    @endif
</small>
