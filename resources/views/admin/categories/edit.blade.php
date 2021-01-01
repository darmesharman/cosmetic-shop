@extends('layouts.panel')

@section('content')
    <form action="{{ route('categories.update', ['category' => $category ]) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="category name" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
