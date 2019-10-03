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
                    <input type="text" class="form-control" name="name" value="{{ $recruiter->name }}"/>

                    <label for="name">Notify when available:</label>
                    <input type="checkbox" class="form-control" name="notify_when_available"/>

                    <select class="form-control" name="company_id">
                        @foreach($companies as $id => $label)
                            <option value="{{ $id }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Recruiter</button>
            </form>
        </div>
    </div>
@endsection