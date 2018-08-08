@extends('layout.static')

@section('content')
<div class="peers">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 peer pX-40 pY-80 bgc-white scrollable m-auto" style='min-width: 320px;'>
                <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="text-normal text-dark">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="text-normal text-dark">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <div class="peers ai-c jc-sb fxw-nw">
                            <div class="peer">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Remember Me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="peer">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
