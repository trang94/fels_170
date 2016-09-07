@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit word
            </div>

            <div class="panel-body">
                <!-- create form -->
                <form action="{{ url('admin/word/' . $word->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

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
                                    <option
                                    @if ($word->category_id == $category->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <input type="text" name="content" id="content" class="form-control" value="{{$word->content}}">
                        </div>
                    </div>

                    <!-- anwsers -->
                    <div id="anwsers">
                        @foreach ($word->anwsers as $key => $anwsers)
                        <div class="form-group anwser_update" id="anwser-{{ $anwsers->id }}">
                            <label for="task-name" class="col-sm-3 control-label">Anwser</label>
                            <div class="col-sm-4">
                                <input type="text" name="anwsers_update[{{ $key }}]" class="form-control" value="{{ $anwsers->content }}">
                                <input type="hidden" value="{{ $anwsers->id }}" name="anwser_ids[{{ $key }}]">
                            </div>
                            <div class="col-sm-2">
                                <label class="radio-inline"><input type="radio" name="is_anwser" value="{{ $key }}"
                                @if ($anwsers->is_correct == 1)
                                    {{"checked"}}
                                @endif
                                >is correct</label>
                            </div>
                            <div class="col-sm-1 delete">
                                <i class="glyphicon glyphicon-remove DelButton" data-id = "{{ $anwsers->id }}" data-url="{{url("admin/anwser/" . $anwsers->id)}}"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label"><a id="add-btn">+Add a anwser</a></label>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-save"></i>Update
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
