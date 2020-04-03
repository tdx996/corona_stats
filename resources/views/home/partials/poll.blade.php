{!! Form::open(['route' => ['polls.answer', $poll], 'class' => 'modal fade show', 'id' => 'modal_poll']) !!}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Anonimno vprašanje
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="value">{{ $poll->question }}</label>
                    <input type="range" class="custom-range" name="value" id="value" min="1" max="10" step="1">
                    <div class="d-flex justify-content-between">
                        @foreach ($poll->scale as $scale)
                            <div>
                                {{ $scale }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary">
                    Odgovori
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#modal_poll').modal('show')
            }, 15000);
        });
    </script>
@endpush
