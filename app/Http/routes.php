<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['prefix' => 'user'], function(){
            Route::get('list', 'UserController@getList');
        });
    });
    Route::resource('user', 'UserController', ['only' => [
        'show', 'edit', 'update'
    ]]);
    Route::resource('relationship', 'RelationshipController', ['only' => [
        'store', 'destroy'
    ]]);
    Route::get('/user/{user}/following', 'UserController@getFollowing');
    Route::get('/user/{user}/followers', 'UserController@getFollowers');
});
