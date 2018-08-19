@extends('layout.console')

@section('content')
    <div class="card">
        <div class="card-header">Add Species</div>
        <div class="card-body">
            <form action="{{ route('species.store') }}" method="post">
                {{ csrf_field() }}
                @include('console.species.form')
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
