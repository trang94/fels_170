@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create category
            </div>

            <div class="panel-body">
                <!-- create form -->
                <form action="/admin/category" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br/>
                            @endforeach
                        </div>
                    @endif

                    <!-- Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" id="task-name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-save"></i>Create
                            </button>
                        </div>
                    </div>
                </form>
                <<<a href="{{ url('/admin/category') }}">Back to categories list</a>
            </div>
        </div>
    </div>
</div>
@endsection
