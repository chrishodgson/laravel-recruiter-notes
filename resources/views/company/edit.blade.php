@extends('layout')

@section('content')
    @include('shared.back')
    <div class="card">
        <div class="card-header">
            Update Companies
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('companies.update', $company->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}"/>

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details" rows="3">{{ old('details', $company->details) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Company</button>
            </form>
        </div>
    </div>
@endsection