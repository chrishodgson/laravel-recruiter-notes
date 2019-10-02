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

        <h4>Companies</h4>
            <p><a href="{{ route('companies.create') }}" class="btn btn-link btn-sm">Create Company</a></p>
        <table class="table table-striped1">
            <thead>
            <tr>
                <td>Name</td>
                <td>Details</td>
                <td>Updated</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->details}}</td>
                    <td>{{(new Carbon\Carbon($company->updated_at))->diffForHumans()}}</td>
                    <td><a href="{{ route('companies.edit', $company->id)}}" class="btn btn-sm btn-secondary">Edit</a></td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-secondary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    <div>
@endsection