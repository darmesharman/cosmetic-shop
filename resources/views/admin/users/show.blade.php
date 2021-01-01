@extends('layouts.panel')

@section('content')
    <p class="d-inline-block table-primary p-1 rounded border border-dark">{{ $user->name }} roles</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Roles name</th>
                <th scope="col">Set/Unset</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="@if ($user->hasRole($role->name)) table-primary @endif">
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('put')

                            <input type="hidden" name="role" value="{{ $role->name }}">
                            @if ($user->hasRole($role->name))
                                <input type="hidden" name="set-unset" value="unset">
                                <button type="submit" class="btn btn-danger">unset role</button>
                            @else
                                <input type="hidden" name="set-unset" value="set">
                                <button type="submit" class="btn btn-info">set role</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
