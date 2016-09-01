@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create word
            </div>

            <div class="panel-body">
                <!-- create form -->
                <form action="/admin/word" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br/>
                            @endforeach
                        </div>
                    @endif

                    <!-- content -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Category</label>

                        <div class="col-sm-3">
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <input type="text" name="content" id="content" class="form-control">
                        </div>
                    </div>

                    <!-- anwsers -->
                    <div id="anwsers">
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Anwser</label>

                            <div class="col-sm-4">
                                <input type="text" name="anwsers[1]" id="anwsers[1]" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="radio-inline"><input type="radio" name="is_anwser" value="1">is correct</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label"><a id="add-btn">+Add a anwser</a></label>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-save"></i>Create
                            </button>
                        </div>
                    </div>
                </form>
                <<<a href="{{ url('/admin/word') }}">Back to words list</a>
            </div>
        </div>
    </div>
</div>
@endsection
