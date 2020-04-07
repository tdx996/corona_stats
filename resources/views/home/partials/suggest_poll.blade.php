<div class="card card-widget card-widget-poll">
    <div class="card-header">
        <div class="user-block">
            <i class="fas fa-check-circle fa-2x text-green"></i>
            <span class="username text-lg">
                Odlično! Hvala, ker si odgovoril na vsa vprašanja.
            </span>
            <span class="description">
                V zahvalo ti nudimo možnost, da predlagaš vprašanje.
            </span>
        </div>
        <div class="card-tools">
            <button class="btn btn-primary" id="trigger_suggest_poll_modal">
                Predlagaj vprašanje
            </button>
        </div>
    </div>
</div>

{!! Form::open(['route' => ['polls.suggest'], 'class' => 'modal fade show', 'id' => 'modal_suggest_poll']) !!}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Predlagaj vprašanje
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('question', 'Vprašanje') !!}
                    {!! Form::text('question', null, ['class' => 'form-control', 'required' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('answers', "Odgovori", ['class' => 'optional']) !!}
                    @foreach (range(1, 4) as $i)
                        {!! Form::text('answers[]', null, ['class' => 'form-control mb-2', 'placeholder' => "Odgovor {$i}"]) !!}
                    @endforeach
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary">
                    Predlagaj
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#trigger_suggest_poll_modal').on('click', function() {
                $('#modal_suggest_poll').modal('show');
            });
        });
    </script>
@endpush
