@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">
        Add Companies
    </div>
    <div class="card-body">
        @include('shared.errors')

        <p><a href="{{route('companies.index')}}">Back to Company List</a></p>

        <form method="post" action="{{ route('companies.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>
    </div>
</div>
@endsection