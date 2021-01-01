@extends('layouts.panel')

@section('content')
<h5 class="text-center">Users List</h5>
<table class="table table-striped">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">Roles</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.show', ['user' => $user]) }}" method="get">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Roles</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('users.destroy', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
