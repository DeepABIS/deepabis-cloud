@extends('layouts.console')

@section('content')
<h4 class="c-grey-900">Edit {{ $user->name }}</h4>
<form action="{{ route('users.update', ['user' => $user]) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
    @include('console.users.form')
    <button class="btn btn-primary">Save</button>
</form>
@endsection
