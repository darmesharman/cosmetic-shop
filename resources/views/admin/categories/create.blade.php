@extends('layouts.panel')

@section('content')
<form action="{{ route('categories.store') }}" method="post">
    @csrf

    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="category name" required>
    </div>
    <button type="submit" class="btn btn-primary">Create category</button>
</form>
@endsection
