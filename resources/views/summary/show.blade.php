@extends('layout')

@section('content')
    <div class="uper">
        <p><a href="{{route('summary.index')}}">Back to Recruiter Summary</a></p>
        <h4>Recruiter</h4>
        <table class="table table-striped1">
            <tbody>
                <tr>
                    <td>Recruiter</td>
                    <td>{{$recruiter->name}}</td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td>{{$recruiter->details}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$recruiter->email}}</td>
                </tr>
                <tr>
                    <td>Landline</td>
                    <td>{{$recruiter->landline}}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{$recruiter->mobile}}</td>
                </tr>
                <tr>
                    <td>Linkedin</td>
                    <td>{{$recruiter->linkedin}}</td>
                </tr>
                <tr>
                    <td>Latest Note Date</td>
                    <td>{{(new Carbon\Carbon($recruiter->latest_note_at))->diffForHumans()}}</td>
                </tr>
                <tr>
                    <td>Follow Up Count</td>
                    <td>{{$recruiter->follow_up_count}}</td>
                </tr>
            </tbody>
        </table>

        <hr/>
        <h4>Notes</h4>
        @if($recruiter->notes->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Date</td>
                <td>Details</td>
                <td>Follow Up?</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recruiter->notes as $note)
                <tr>
                    <td>{{(new Carbon\Carbon($note->updated_at))->diffForHumans()}}</td>
                    <td>{{$note->details}}</td>
                    <td>{{$note->follow_up ? 'yes' : 'no'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <p>No notes found.</p>
        @endif
    <div>
@endsection