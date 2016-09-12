@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message')}}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><strong>{{ $lesson->category->name }}: Lesson {{ $lesson->id }}</strong></h3>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-condensed">
                        <a href="#" class="btn btn-default">Submit</a>
                        <tbody>
                            @foreach ($words as $key => $word)
                                <tr>
                                    <td class="col-sm-1">{{ $key + 1 }}.</td>
                                    <td><strong>{{ $word->content }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1"></td>
                                    @foreach ($word->anwsers as $anwser)
                                        <td class="col-sm-2"><input type="radio" value="{{ $anwser->id }}" name="word_anwser[{{ $word->id }}]">{{ $anwser->content }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            <tr>
                                <td><a href="#" class="btn btn-default">Submit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
