@extends('layouts.default')

@section('title')
    <title>Mask.Org :: Login Page</title>
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
                    <div class="panel-heading mask-banner"  style="background-color: tomato; color: white;">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/login">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="e.g username@domain.com">
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
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="#">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
