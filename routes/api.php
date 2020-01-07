<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['cors','api']], function () {

    // Post routes...
    Route::group(['prefix' => 'posts', 'namespace' => 'API'],function (){
        Route::get('/', 'PostController@index');
        Route::get('/topic/{topic_slug}', 'PostController@indexByTopic');
        Route::post('/{id}', 'PostController@store');
        Route::delete('/{id}', 'PostController@destroy');
    });

    // Topic routes...
    Route::group(['prefix' => 'topics', 'namespace' => 'API'],function () {
        Route::get('/', 'TopicController@index');
    });

    // Comment routes...
    Route::post('/submit', 'API\CommentController@submitComment');

    Route::group(['prefix' => 'auth'], function (){
        Route::post('login', 'API\AuthController@login');
        Route::post('logout', 'API\AuthController@logout');
        Route::post('refresh', 'API\AuthController@refresh');
        Route::post('me', 'API\AuthController@me');
    });

});
