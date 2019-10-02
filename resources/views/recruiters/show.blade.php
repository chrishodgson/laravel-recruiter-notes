@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
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
                    <td>Latest Note Date</td>
                    <td>{{(new Carbon\Carbon($recruiter->latest_note_at))->diffForHumans()}}</td>
                </tr>
                <tr>
                    <td>Follow Up Count</td>
                    <td>{{$recruiter->follow_up_count}} {{dd($recruiter)}}</td>
                </tr>
            </tbody>
        </table>
    <div>
@endsection