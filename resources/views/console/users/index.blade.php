@extends('layouts.console')

@section('content')
<div class="row">
    <div class="col-1 mb-3">
        <h4>Users</h4>
    </div>
    <div class="col-11 text-right">
        <a href="{{ route('users.create') }}"><button class="btn btn-success">Add user</button></a>
    </div>
</div>
<table class="data-table table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', ['user' => $user]) }}">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="post" style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
