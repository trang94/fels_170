@extends('layouts.app')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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
    <div class="col-lg-10">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h1><strong>Words list</strong></h1>
        </div>
        @include('word.anphafilter')
        <div align="center">{!! $words->links() !!}</div>
        </div>
    </div>
</div>
<script>
    var app = angular.module('app', []);
    var words = {!! $word !!};
    var word = words.data;
    app.filter('startsWithLetter', function () {
        return function (items, letter) {
            var filtered = [];
            var letterMatch = new RegExp(letter, 'i');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                if (letterMatch.test(item.content.substring(0, 1))) {
                    filtered.push(item);
                }
            }
            return filtered;
        };
    });

    app.controller('WordCtrl', function () {
        this.words = word;
    });
</script>
@endsection
