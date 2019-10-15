@extends('layout')

@section('content')
    @include('shared.back')
    <h4>Note</h4>
    <p><a href="{{route('notes.edit', $note->id)}}">Edit Note</a></p>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Title</td>
                <td>{{$note->title}}</td>
            </tr>
            <tr>
                <td>Details</td>
                <td><pre>{{$note->details}}</pre></td>
            </tr>
            <tr>
                <td>Updated</td>
                <td>{{(new Carbon\Carbon($note->updated_at))->diffForHumans()}}</td>
            </tr>
            <tr>
                <td>Follow Up?</td>
                <td>{{$note->follow_up ? 'yes' : 'no'}}</td>
            </tr>
        </tbody>
    </table>
@endsection