@extends('layout')

@section('content')
    <div class="uper">
        @include('shared.alerts')

        <h4>Recruiters List</h4>
        <p><a href="{{ route('recruiters.create') }}" class="btn btn-link">Create Recruiter</a></p>

        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Recruiter</td>
                <td>Company</td>
                <td>Details</td>
                <td>Notify when<br>Available</td>
                <td>Follow Up<br>Count</td>
                <td>Updated</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recruiters as $recruiter)
                <tr>
                    <td><a href="{{route('summary.show', $recruiter->id)}}">{{$recruiter->name}}</a></td>
                    <td>{{$recruiter->company->name}}</td>
                    <td>{{$recruiter->details}}</td>
                    <td>{{$recruiter->notify_when_available ? 'Yes' : 'No'}}</td>
                    <td>{{$recruiter->follow_up_count}}</td>
                    <td>{{(new Carbon\Carbon($recruiter->updated_at))->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('recruiters.edit', $recruiter->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                        <form class="d-inline-block" action="{{ route('recruiters.destroy', $recruiter->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-secondary" type="submit"
                                    onclick="return confirm('Are you sure that you want to delete this Recruiter?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $recruiters->links() }}
    <div>
@endsection