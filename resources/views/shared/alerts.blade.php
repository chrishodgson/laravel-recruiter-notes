@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @php
        Session()->forget('success');
    @endphp
@endif
