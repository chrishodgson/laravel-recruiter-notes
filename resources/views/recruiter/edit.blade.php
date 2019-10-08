@extends('layout')

@section('content')
    <p class="uper"><a href="{{route('recruiters.index')}}">Back to Recruiter List</a></p>
    <div class="card">
        <div class="card-header">
            Update Recruiters
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('recruiters.update', $recruiter->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Recruiter Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $recruiter->name) }}" />

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details">{{ old('details', $recruiter->details) }}</textarea>

                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $recruiter->email) }}" />

                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile', $recruiter->mobile) }}" />

                    <label for="landline">Landline:</label>
                    <input type="text" class="form-control" id="landline" name="landline" value="{{ old('landline', $recruiter->landline) }}" />

                    <label for="linkedin">Linkedin:</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $recruiter->linkedin) }}" />

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="notify_when_available" name="notify_when_available" value="1"
                                {{ old('notify_when_available', $recruiter->notify_when_available) ? "checked" : '' }} />
                        <label class="form-check-label" for="notify_when_available">Notify when available</label>
                    </div>

                    <select class="form-control" name="company_id">
                        @foreach($companies as $id => $label)
                            <option value="{{ $id }}" {{ old('company_id', $recruiter->company_id) == $id ? "selected" : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Recruiter</button>
            </form>
        </div>
    </div>
@endsection