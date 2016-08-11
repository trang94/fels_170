@extends('layouts.app')

@section('content')
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
                    @foreach($following as $usr)
                        <h4>
                            <a href="{{ url('/user/' . $usr->id) }}">{{ $usr->name }}</a>
                        </h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
