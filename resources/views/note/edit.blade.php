@extends('layout')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Update Notes
        </div>
        <div class="card-body">
            @include('shared.errors')

            <p><a href="{{route('notes.index')}}">Back to Note List</a></p>

            <form method="post" action="{{ route('notes.update', $note->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Details:</label>
                    <input type="text" class="form-control" name="details" value="{{ $note->details }}"/>

                    <label for="name">Follow up:</label>
                    <input type="checkbox" class="form-control" name="follow_up"/>

                    <select class="form-control" name="recruiter_id">
                        @foreach($recruiters as $id => $label)
                            <option value="{{ $id }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Note</button>
            </form>
        </div>
    </div>
@endsection