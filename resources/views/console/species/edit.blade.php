@extends('layout.console')

@section('content')
<h4 class="c-grey-900">Edit {{ $species->name }}</h4>
<form action="{{ route('species.update', ['species' => $species]) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
    @include('console.species.form')
    <button class="btn btn-primary">Save</button>
</form>
@endsection
