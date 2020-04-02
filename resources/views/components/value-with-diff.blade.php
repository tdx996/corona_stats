<small class="text-gray {{ $value && $value > 0 ? 'text-danger' : 'text-success' }}">
    @if (isset($value))
        @if ($value > 0)
            +{{ $value }}
        @else
            {{ $value }}
        @endif
    @else
        Ni podatka
    @endif
</small>
