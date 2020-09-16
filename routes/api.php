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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getApi/{id}','BoardsController@getApi');

Route::get('/messager/friendlist','MessageController@friendList');

Route::get('/messager/loadfriend/{id}','MessageController@loadFriend');

Route::get('/messager/sendbox/{id}','MessageController@sendBox');

Route::post('/messager/newfriend','MessageController@newFriend');

Route::post('/messager/sendmessage','MessageController@sendMessage');





Route::get('/api/board/{board}','APIController@getBoard');
Route::get('/api/post/{post}','APIController@getPost');
Route::get('/api/getBoardList','APIController@getBoardList');
Route::post('/api/newComment','APIController@newComment');
