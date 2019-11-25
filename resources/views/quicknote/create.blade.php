@extends('layout')

@section('content')
    @include('shared.back')
    <div class="card">
        <div class="card-header">
            Add Notes
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('quicknotes.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details" rows="5">{{ old('details') }}</textarea>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="follow_up" name="follow_up" value="1"
                                {{ old('follow_up') ? "checked" : '' }} />
                        <label class="form-check-label" for="follow_up">Follow up</label>
                    </div>

                    <label for="company_name">Company name:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" />

                    <label for="recruiter_name">Recruiter name:</label>
                    <input type="text" class="form-control" id="recruiter_name" name="recruiter_name" value="{{ old('recruiter_name') }}" />
                </div>
                <button type="submit" class="btn btn-primary">Create Note</button>
            </form>
        </div>
    </div>
@endsection