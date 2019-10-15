@extends('layout')

@section('content')
    @include('shared.back')
    <div class="card">
        <div class="card-header">
            Add Recruiters
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('recruiters.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Recruiter Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>

                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />

                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" />

                    <label for="landline">Landline:</label>
                    <input type="text" class="form-control" id="landline" name="landline" value="{{ old('landline') }}" />

                    <label for="linkedin">Linkedin:</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}" />

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="notify_when_available" name="notify_when_available" value="1"
                                {{ old('notify_when_available') ? "checked" : '' }} />
                        <label class="form-check-label" for="notify_when_available">Notify when available</label>
                    </div>

                    <select class="form-control" name="company_id">
                        <option value="">-- Please select --</option>
                    @foreach($companies as $id => $label)
                        <option value="{{ $id }}" {{ old('company_id') == $id ? "selected" : '' }}>{{ $label }}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Recruiter</button>
            </form>
        </div>
    </div>
@endsection