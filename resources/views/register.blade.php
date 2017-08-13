@extends('layouts.default')

@section('title')
    <title>Mask.Org :: Register Page</title>
@stop

@section('content')
   @if(session('message'))
       <div class="alert alert-{{session('message.type')}}">
           {{session('message.text')}}
       </div>
   @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading "  style="background-color: tomato; color: white;">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/register">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Full Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name">
                                    @if ($errors->has('fullname'))
                                        <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="e.g username@domain.com">
                                    @if ($errors->has('email'))
                                        <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password_confirm" id="password_confirm" placeholder="Confirm Password ">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
