@if (session()->has('success'))
    @push('scripts')
        <script>
            $(document).ready(function(){
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Odlično!',
                    body: '{{ session()->get('success') }}',
                    icon: 'fas fa-check',
                    autohide: true,
                    delay: 2000,
                })
            });
        </script>
@endpush
@endif
