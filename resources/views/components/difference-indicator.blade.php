<small class="text-{{ $color ?? ($value && $value > 0 ? 'danger' : 'success') }} {{ $class ?? '' }}">
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
