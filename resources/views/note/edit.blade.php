@extends('layout')

@section('content')
    <p><a href="{{route('notes.index')}}">Back to Note List</a></p>
    <div class="card">
        <div class="card-header">
            Update Notes
        </div>
        <div class="card-body">
            @include('shared.errors')
            <form method="post" action="{{ route('notes.update', $note->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="details">Details:</label>
                    <textarea class="form-control" id="name" name="details">{{ old('details', $note->details) }}</textarea>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="follow_up" name="follow_up" value="1"
                                {{ old('follow_up', $note->follow_up) ? "checked" : '' }} />
                        <label class="form-check-label" for="follow_up">Follow up:</label>
                    </div>

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