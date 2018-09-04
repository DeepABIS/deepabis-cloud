@extends('layouts.console')

@section('content')
    <div class="card">
        <div class="card-header">Edit {{ $dataset->name }}</div>
        <div class="card-body">
            <form action="{{ route('datasets.update', ['dataset' => $dataset]) }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                @include('console.datasets.form')
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
