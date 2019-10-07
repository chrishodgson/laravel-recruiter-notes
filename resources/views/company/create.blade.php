@extends('layout')

@section('content')
    <p class="uper"><a href="{{route('companies.index')}}">Back to Company List</a></p>
    <div class="card">
        <div class="card-header">
            Add Companies
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('companies.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Company</button>
            </form>
        </div>
    </div>
@endsection