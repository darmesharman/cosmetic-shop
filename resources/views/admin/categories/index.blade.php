@extends('layouts.panel')

@section('content')
<h5 class="text-center">Categories List</h5>
<table class="table table-striped">
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('categories.edit', ['category' => $category]) }}" method="get">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{ route('categories.create') }}" method="get" class="row justify-content-center">
    @csrf

    <button type="submit" class="btn btn-primary">Create category</button>
</form>
@endsection
