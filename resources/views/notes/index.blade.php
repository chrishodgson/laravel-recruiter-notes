@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Note</td>
                <td>Date</td>
                <td>Follow Up?</td>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{$note->id}}</td>
                    <td>{{$note->name}}</td>
                    <td>{{$note->details}}</td>
                    <td>{{$note->note_updated_at}}</td>
                    <td>{{$note->follow_up ? 'yes' : 'no'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $notes->links() }}
    <div>
@endsection