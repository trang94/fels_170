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
                    <div>
                        <a href="{{ url('/user/' . $user->id . '/following') }}">{{ count($following) }} following</a>
                        <a href="{{ url('/user/' . $user->id . '/followers') }}">{{ count($followers) }} followers</a>
                        @unless(Auth::User()->id == $user->id)
                            @if(Auth::User()->followed($user))
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/relationship/' . Auth::User()->relationship_with($user)->id) }}">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">Unfollow</button>
                                </form>
                            @else
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/relationship') }}">
                                    {!! csrf_field() !!}
                                    {{ method_field('POST') }}

                                    <input id="followed_id" type="hidden" value="{{ $user->id }}" name="followed_id">
                                    <button type="submit" class="btn btn-primary">Follow</button>
                                </form>
                            @endif
                        @endunless
                    </div>
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
