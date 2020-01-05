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

//Route::middleware('auth:api')->get('/user','API\A');


 // Stats routes...
//    Route::get('/comment', 'CommentController@index');
//    Route::get('/post/{post_id}/comments', 'CommentController@getPostComments');

    // Post routes...
    Route::group(['prefix' => 'posts', 'namespace' => 'API'],function (){
        Route::get('/', 'PostController@index');
        Route::get('/topic/{topic_slug}', 'PostController@indexByTopic');
        Route::get('/{id?}', 'PostController@show');
        Route::post('/{id}', 'PostController@store');
        Route::delete('/{id}', 'PostController@destroy');
    });

//    // Media routes...
//    Route::post('/media/uploads', 'MediaController');
//
//    // Tag routes...
//    Route::get('/tags', 'TagController@index');
//    Route::get('/tags/{id?}', 'TagController@show');
//    Route::post('/tags/{id}', 'TagController@store');
//    Route::delete('/tags/{id}', 'TagController@destroy');
//
    // Topic routes...
    Route::group(['prefix' => 'topics', 'namespace' => 'API'],function () {
        Route::get('/', 'TopicController@index');
        Route::get('/{id?}', 'TopicController@show');
        Route::post('/{id}', 'TopicController@store');
        Route::delete('/{id}', 'TopicController@destroy');
    });

Route::group(['middleware' => ['cors','api']], function () {

    Route::post('/submit', 'API\CommentController@submitComment');

    Route::group(['prefix' => 'auth'], function (){
        Route::post('login', 'API\AuthController@login');
        Route::post('logout', 'API\AuthController@logout');
        Route::post('refresh', 'API\AuthController@refresh');
        Route::post('me', 'API\AuthController@me');
    });

});
