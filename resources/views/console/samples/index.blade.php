@extends('layout.console')

@section('content')
    <h4 class="c-grey-900 mB-20">Data</h4>
    <Dataset :species='@json($species)'></Dataset>
@endsection
