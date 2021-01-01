@extends('layouts.panel')

@section('content')
<h5 class="text-center">Roles List</h5>
<table class="table table-striped">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Permissions</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>
                    <form action="{{ route('roles.show', ['role' => $role]) }}" method="get">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Permissions</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('roles.edit', ['role' => $role]) }}" method="get">
                        @csrf

                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('roles.destroy', ['role' => $role]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{ route('roles.create') }}" method="get" class="row justify-content-center">
    @csrf

    <button type="submit" class="btn btn-primary">Create role</button>
</form>
@endsection
