@extends('layout')

@section('content')
    <div class="uper">
        <p><a href="#" onclick="window.history.back();">Back to previous page</a></p>
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
                    <td><a href="mailto:{{$recruiter->email}}">{{$recruiter->email}}</a></td>
                </tr>
                <tr>
                    <td>Landline</td>
                    <td><a href="tel:{{$recruiter->landline}}">{{$recruiter->landline}}</a></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><a href="tel:{{$recruiter->mobile}}">{{$recruiter->mobile}}</a></td>
                </tr>
                <tr>
                    <td>Linkedin</td>
                    <td><a href="{{$recruiter->linkedin}}">{{$recruiter->linkedin}}</a></td>
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