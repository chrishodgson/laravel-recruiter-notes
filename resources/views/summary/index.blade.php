@extends('layout')

@section('content')
    <div class="uper">
        <h4>Recruiter Summary</h4>

        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Recruiter</td>
                <td>Details</td>
                <td>Date</td>
                <td>Follow Up</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recruiters as $recruiter)
                @php
                    $latestNote = $recruiter->latestNote->first();
                @endphp
                <tr>
                    <td><a href="{{route('summary.show', $recruiter->id)}}">{{$recruiter->name}}</a></td>
                    <td>{{$latestNote['details']}}</td>
                    <td>{{(new Carbon\Carbon($recruiter->latest_note_date))->diffForHumans()}}</td>
                    <td>{{$latestNote['follow_up'] ? 'yes' : 'no'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $recruiters->links() }}
    <div>
@endsection