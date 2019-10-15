@extends('layout')

@section('content')
    @include('shared.back')
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
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $note->title) }}" />

                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details" rows="5">{{ old('details', $note->details) }}</textarea>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="follow_up" name="follow_up" value="1"
                                {{ old('follow_up', $note->follow_up) ? "checked" : '' }} />
                        <label class="form-check-label" for="follow_up">Follow up</label>
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