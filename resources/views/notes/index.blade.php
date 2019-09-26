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
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Details</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{$note->id}}</td>
                    <td></td>
                    <td></td>
                    <td>
{{--                        <a href="{{ route('shows.edit', $show->id)}}" class="btn btn-primary">Edit</a>--}}
                    </td>
                    <td>
{{--                        <form action="{{ route('shows.destroy', $show->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button class="btn btn-danger" type="submit">Delete</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection