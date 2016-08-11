@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Profile
            </div>

            <div class="panel-body">
                <!-- edit form -->
                <form action="/user/{user}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <!-- Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ $user->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" id="task-name" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>

                    <!-- User Id -->
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-save"></i>Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
