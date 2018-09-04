@extends('layouts.console')

@section('content')
    <div class="card">
        <div class="card-header">Add User</div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                {{ csrf_field() }}
                @include('console.users.form')
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
