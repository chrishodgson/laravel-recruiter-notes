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
        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Recruiter</td>
                <td>Details</td>
                <td>Date</td>
                <td>Follow Up?</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recruiters as $recruiter)
                <tr>
                    <td><a href="{{route('recruiters.show', ['recruiter' => $recruiter->id])}}">{{$recruiter->name}}</a></td>
                    <td>{{$recruiter->latest_note_details}}</td>
                    <td>{{(new Carbon\Carbon($recruiter->latest_note_date))->diffForHumans()}}</td>
                    <td>{{$recruiter->latest_note_follow_up ? 'yes' : 'no'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $recruiters->links() }}
    <div>
@endsection