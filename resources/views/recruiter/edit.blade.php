@extends('layout')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Update Recruiters
        </div>
        <div class="card-body">
            @include('shared.errors')

            <p><a href="{{route('recruiters.index')}}">Back to Recruiter List</a></p>

            <form method="post" action="{{ route('recruiters.update', $recruiter->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Recruiter Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $recruiter->name) }}" />

                    <label for="name">Notify when available:</label>
                    <input type="checkbox" class="form-control" name="notify_when_available" value="1"
                            {{ old('notify_when_available', $recruiter->notify_when_available) ? "checked" : '' }} />

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