@extends('layout.console')

@section('content')
    <div class="card">
        <div class="card-header">Add Dataset</div>
        <div class="card-body">
            <form action="{{ route('datasets.store') }}" method="post">
                {{ csrf_field() }}
                @include('console.datasets.form')
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
