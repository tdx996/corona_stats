{!! Form::open(['route' => ['subscribers.create'], 'class' => 'modal fade show', 'id' => 'modal_subscribe']) !!}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Obveščaj me o novostih
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center bg-gray p-2 rounded">
                    Te zanimajo najnovejši statistični podatki o virusu? <br> Vpiši svoj email, če želiš obveščen o novostih!
                </p>
                <div class="form-group">
                    {!! Form::label('email', 'Vaš email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
                    <p class="text-sm">
                        Ne pošiljamo vsiljive pošte, le najnovejše podatke.
                    </p>
                </div>

                <div class="form-group">
                    {!! Form::label('comment', 'Kaj te najbolj zanima?', ['class' => 'optional']) !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3]) !!}
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary">
                    Naroči se
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.trigger-subscribe-modal').on('click', function() {
                $('#modal_subscribe').modal('show')
            })
        });
    </script>
@endpush
