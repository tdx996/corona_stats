@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fas fa-check mr-1"></i>
        {{ session()->get('success') }}
    </div>
@endif
