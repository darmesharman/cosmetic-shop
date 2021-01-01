@extends('layouts.panel')

@section('content')
    <p class="d-inline-block table-primary p-1 rounded border border-dark">{{ $role->name }} permissions</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Permission name</th>
                <th scope="col">Set/Unset</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr class="@if ($role->hasPermission($permission->name)) table-primary @endif">
                    <th scope="row">{{ $permission->id }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <form action="{{ route('roles.update', ['role' => $role]) }}" method="post">
                            @csrf
                            @method('put')

                            <input type="hidden" name="permission" value="{{ $permission->name }}">
                            @if ($role->hasPermission($permission->name))
                                <input type="hidden" name="set-unset" value="unset">
                                <button type="submit" class="btn btn-danger">unset permission</button>
                            @else
                                <input type="hidden" name="set-unset" value="set">
                                <button type="submit" class="btn btn-info">set permission</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
