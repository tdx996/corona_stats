{!! Form::open(['route' => ['subscribers.create'], 'class' => 'modal fade show', 'id' => 'modal_donate']) !!}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Brezplačna donacija
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    S klikom na spodnji gumb boste preusmerjeni na spletno stran, ki je del našega oglaševalskega programa.
                </p>
                <p class="text-center">
                    Na ta način boste boste opravili brezplačno donacijo in nam omogočili, da še naprej ostanemo z vami.
                </p>
            </div>
            <div class="modal-footer text-right">
                <a href="//ofgogoatan.com/afu.php?zoneid=3191599" target="_blank" class="btn btn-primary">
                    Opravi donacijo
                </a>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#trigger_donate_modal').on('click', function() {
                $('#modal_donate').modal('show')
            })
        });
    </script>
@endpush
