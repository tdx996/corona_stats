{!! Form::open(['route' => ['polls.answer', $poll], 'class' => 'card card-widget card-widget-poll', 'id' => 'form_poll']) !!}
    <div class="card-header">
        <div class="user-block">
            <i class="fas fa-question-circle fa-2x"></i>
            <span class="username text-lg">
                {{ $poll->question }}
            </span>
        </div>
        <div class="card-tools">
            @foreach ($poll->options as $option)
                <button class="btn btn-primary" data-value="{{ $option }}">
                    {{ $option }}
                </button>
            @endforeach

            {!! Form::hidden('value') !!}
            {!! Form::submit(null, ['style' => 'display: none;']) !!}
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#form_poll button[data-value]').on('click', function(e) {
                e.preventDefault();

                var form = $(this).closest('form');
                var value = $(this).data('value');

                form.find('input[name="value"]').val(value);
                form.submit();
            })
        })
    </script>
@endpush
