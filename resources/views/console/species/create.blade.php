@extends('layout.console')

@section('content')
<h4>Add Species</h4>
<form action="{{ route('species.store') }}" method="post">
    {{ csrf_field() }}
    @include('console.species.form')
    <button class="btn btn-primary">Save</button>
</form>
@endsection
