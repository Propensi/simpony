@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <h2>{{ Session::get('flash_message') }}</h2>
    </div>
    @endif