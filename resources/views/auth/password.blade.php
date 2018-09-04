@extends('layouts.static')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 scrollable m-auto" style='min-width: 320px;'>
                <h4>Choose a new password</h4>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="text-normal text-dark">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
