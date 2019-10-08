@extends('layout')

@section('content')
    <div class="uper">
        @include('shared.alerts')

        <h4>Notes List</h4>
        <p><a href="{{ route('notes.create') }}" class="btn btn-link">Create Note</a></p>

        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Details</td>
                <td>Recruiter</td>
                <td>Follow Up</td>
                <td>Updated</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{$note->details}}</td>
                    <td><a href="{{ route('summary.show', $note->recruiter_id)}}">{{$note->recruiter->name}}</a></td>
                    <td>{{$note->follow_up ? 'Yes' : 'No'}}</td>
                    <td>{{(new Carbon\Carbon($note->updated_at))->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                        <form class="d-inline-block" action="{{ route('notes.destroy', $note->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-secondary" type="submit"
                                    onclick="return confirm('Are you sure that you want to delete this Note?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $notes->links() }}
    <div>
@endsection