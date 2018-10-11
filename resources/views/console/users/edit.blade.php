@extends('layouts.console')

@section('content')
<div class="card">
    <div class="card-header">Edit {{ $user->name }}</div>
    <div class="card-body">
        <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            @include('console.users.form')
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
