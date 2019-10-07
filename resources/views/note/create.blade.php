@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">
        Add Notes
    </div>
    <div class="card-body">
        @include('shared.errors')

        <p><a href="{{route('notes.index')}}">Back to Note List</a></p>

        <form method="post" action="{{ route('notes.store') }}">
            <div class="form-group">
                @csrf
                <label for="details">Details:</label>
                <textarea class="form-control" name="details">{{ old('details') }}</textarea>

                <label for="follow_up">Follow up:</label>
                <input type="checkbox" class="form-control" name="follow_up"/>

                <select class="form-control" name="recruiter_id">
                    @foreach($recruiters as $id => $label)
                        <option value="{{ $id }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Note</button>
        </form>
    </div>
</div>
@endsection