@extends('layout')

@section('content')
    <div class="uper">
        @include('shared.alerts')

        <h4>Notes List</h4>
        <p><a href="{{ route('notes.create') }}" class="btn btn-link btn-sm">Create Note</a></p>

        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Details</td>
                <td>Updated</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{$note->details}}</td>
                    <td>{{(new Carbon\Carbon($note->updated_at))->diffForHumans()}}</td>
                    <td><a href="{{ route('notes.edit', $note->id)}}" class="btn btn-sm btn-secondary">Edit</a></td>
                    <td>
                        <form action="{{ route('notes.destroy', $note->id)}}" method="post">
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