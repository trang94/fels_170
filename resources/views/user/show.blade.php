@extends('layouts.app')

@section('content')

@if(Auth::check())
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Profile</label>
                    @if(Auth::user()->id == $user->id)
                    <div>
                        <a href="/user/{{$user->id}}/edit">Edit</a>
                    </div>
                    @endif
                </div>

                <div class="panel-body">
                    <label>Name: </label>
                    {{$user->name}}
                </div>

                <div class="panel-body">
                    <label>Email: </label>
                    {{$user->email}}
                </div>

            </div>
        </div>
    </div>
</div>
@else
<div class="panel-heading">
    <label>You are not login!</label>
    <div>
        <a href="/login">Login</a>
    </div>
</div>
@endif

@endsection
