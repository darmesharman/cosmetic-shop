@extends('layouts.panel')

@section('content')
<form action="{{ route('roles.store') }}" method="post">
    @csrf
    
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="role name" required>
    </div>
    <button type="submit" class="btn btn-primary">Create role</button>
</form>
@endsection
