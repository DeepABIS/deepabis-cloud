@extends('layout.console')

@section('content')
<div class="row">
    <div class="col-1 mb-3">
        <h4>Datasets</h4>
    </div>
    <div class="col-11 text-right">
        <a href="{{ route('datasets.create') }}"><button class="btn btn-success">Add dataset</button></a>
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
    @foreach($datasets as $dataset)
        <tr>
            <td>{{ $dataset->name }}</td>
            <td>{{ \count($dataset->samples) }}</td>
            <td>
                <a href="{{ route('datasets.edit', ['dataset' => $dataset]) }}">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="{{ route('datasets.destroy', ['dataset' => $dataset]) }}" method="post" style="display: inline">
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
