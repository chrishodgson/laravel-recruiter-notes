@extends('layout')

@section('content')
    <div class="uper">
        <h4>Recruiter Summary</h4>

        <p><a href="{{route('recruiters.create')}}">Create Recruiter</a></p>

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
                <tr>
                    <td><a href="{{route('summary.show', $recruiter->id)}}">{{$recruiter->name}}</a></td>
                    <td>{{$recruiter->latest_note_details}}</td>
                    <td>{{(new Carbon\Carbon($recruiter->latest_note_date))->diffForHumans()}}</td>
                    <td>{{$recruiter->latest_note_follow_up ? 'yes' : 'no'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

{{--        {{ $recruiters->links() }}--}}
    <div>
@endsection