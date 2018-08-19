@extends('layout.console')

@section('content')
<div class="row">
    <div class="col-1">
        <h4 class="c-grey-900 mB-20">Species</h4>
    </div>
    <div class="col-11 text-right">
        <a href="{{ route('species.create') }}"><button class="btn btn-primary">Add species</button></a>
    </div>
</div>
<table id="dataTable" class="data-table table table-striped table-bordered" cellspacing="0" width="100%">
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
            <td>{{ \count($spec->dataset) }}</td>
            <td>
                <a href="{{ route('species.edit', ['species' => $spec->id]) }}">
                    <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                </a>
                <form action="{{ route('species.destroy', ['species' => $spec->id]) }}" method="post" style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
