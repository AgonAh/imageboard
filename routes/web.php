<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Manage boards
Route::get('/manageBoards', 'BoardsController@manageBoards');
Route::post('/setRules/{id}', 'BoardsController@setRules');
Route::post('/deleteBoard/{id}','BoardsController@deleteBoard');

Route::get('/newBoard','BoardsController@newBoardView');
Route::post('/newBoard','BoardsController@newBoardCreate');



Route::get('/', 'BoardsController@index');


Route::get('/messager/friendlist','MessageController@friendList');
Route::get('/messager/loadfriend/{id}','MessageController@loadFriend');
Route::get('/messager/sendbox/{id}','MessageController@sendBox');
Route::post('/messager/newfriend','MessageController@newFriend');
Route::post('/messager/sendmessage','MessageController@sendMessage');
//TODO::REMOVE FROM WEB AND LEAVE IT ON API ONLY

Route::delete('/boards/deleteReply','BoardsController@deleteReply');

Route::get('test','BoardsController@test');

Route::get('/boards', function () {
    return view('pages/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jsv', function(){
	return view('jsv');
});

Auth::routes();

Route::get('/boards/{post}', 'BoardsController@view');

Route::resource('boards', 'BoardsController');

Route::get('/getApi/{id}','BoardsController@getApi');

Route::get('/getBoardApi/{board}','BoardsController@getBoardApi');


//Api start

Route::get('/api/boards/{board}','APIController@getBoard');
Route::get('/api/post/{post}','APIController@getPost');
Route::get('/api/getBoardList','APIController@getBoardList');

Route::post('/api/newComment','APIController@newComment');


Route::get('/messager/friendlist','MessageController@friendList');
Route::get('/messager/loadfriend/{id}','MessageController@loadFriend');
Route::get('/messager/sendbox/{id}','MessageController@sendBox');
Route::post('/messager/newfriend','MessageController@newFriend');
Route::post('/messager/sendmessage','MessageController@sendMessage');

//Api end



Route::get('/{id}','BoardsController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


