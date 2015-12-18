@if(Session::has('message'))
    <div class="alert alert-success flash-message">
        {{ Session::get('message') }}
    </div>
@endif