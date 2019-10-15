@extends('layout')

@section('content')
    <div class="uper">
        @include('shared.alerts')

        <h4>Companies List</h4>
        <p><a href="{{ route('companies.create') }}" class="btn btn-link">Create Company</a></p>

        <table class="table table-striped">
            <thead>
            <tr>
                <td>Name</td>
                <td>Details</td>
                <td>Updated</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->details}}</td>
                    <td>{{(new Carbon\Carbon($company->updated_at))->diffForHumans()}}
                        <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                        <form class="d-inline-block" action="{{ route('companies.destroy', $company->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-secondary" type="submit"
                                    onclick="return confirm('Are you sure that you want to delete this Company?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    <div>
@endsection