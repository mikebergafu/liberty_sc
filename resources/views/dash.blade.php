@extends('layouts.default')

@section('title')
    <title>Admin Page</title>
@stop

@section('content')
    @if(session('message'))
        <div class="alert alert-{{session('message.type')}}">
            {{session('message.text')}}
        </div>
    @endif
   <h1 class="panel-heading">Welcome! </h1>

@stop