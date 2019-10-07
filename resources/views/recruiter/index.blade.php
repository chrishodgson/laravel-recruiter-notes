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
                <td>Updated</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($recruiters as $recruiter)
                <tr>
                    <td>{{$recruiter->name}}</td>
                    <td>{{$recruiter->company->name}}</td>
                    <td>{{$recruiter->details}}</td>
                    <td>{{(new Carbon\Carbon($recruiter->updated_at))->diffForHumans()}}</td>
                    <td><a href="{{ route('recruiters.edit', $recruiter->id)}}" class="btn btn-sm btn-secondary">Edit</a></td>
                    <td>
                        <form action="{{ route('recruiters.destroy', $recruiter->id)}}" method="post">
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