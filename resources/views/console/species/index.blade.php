@extends('layouts.console')

@section('content')
<div class="row">
    <div class="col-1 mb-3">
        <h4>Species</h4>
    </div>
    <div class="col-11 text-right">
        <a href="{{ route('species.create') }}"><button class="btn btn-success">Add species</button></a>
    </div>
</div>
<table class="data-table table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Examples</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Examples</th>
        <th>Actions</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($species as $spec)
        <tr>
            <td>{{ $spec->name }}</td>
            <td>{{ \count($spec->samples) }}</td>
            <td>
                @can('update', $spec)
                <a href="{{ route('species.edit', ['species' => $spec->id]) }}">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                @endcan
                @can('delete', $spec)
                <form action="{{ route('species.destroy', ['species' => $spec->id]) }}" method="post" style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
