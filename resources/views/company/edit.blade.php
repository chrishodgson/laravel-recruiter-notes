@extends('layout')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Update Companies
        </div>
        <div class="card-body">
            @include('shared.errors')

            <p><a href="{{route('companies.index')}}">Back to Company List</a></p>

            <form method="post" action="{{ route('companies.update', $company->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $company->name) }}"/>

                    <label for="details">Details:</label>
                    <textarea class="form-control" name="details">{{ old('details', $company->details) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Company</button>
            </form>
        </div>
    </div>
@endsection