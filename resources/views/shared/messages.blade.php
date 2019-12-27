@if(session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ session('mensaje') }}
    </div>
@endif