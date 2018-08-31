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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discuss', function() {
    return view('discuss');
});

Auth::routes();

Route::get('/forum', ['as'=>'forum', 'uses'=>'ForumsController@index']);


//Github, facebook etc provider
Route::get('{provider}/auth', [
    'as' => 'social.auth',
    'uses' => 'SocialsController@auth'
]);

Route::get('/{provider}/redirect', [
    'uses' => 'SocialsController@auth_callback',
    'as' => 'social.callback'
]);


//Middleware group
Route::group(['middleware' => 'auth'], function(){

    Route::resource('channels', 'ChannelsController');

    Route::get('discussion/create/new', [
        'uses' => 'DiscussionController@create',
        'as' => 'discussions.create'
    ]);

    Route::post('discussion/store', [
        'uses' => 'DiscussionController@store',
        'as' => 'discussions.store'
    ]);

    Route::post('/discussion/reply/{id}', [
        'uses' => 'DiscussionController@reply',
        'as' => 'discussion.reply'
    ]);

    Route::get('/reply/like/{id}', [
        'uses' => 'RepliesController@like',
        'as' => 'reply.like'
    ]);

    Route::get('/reply/unlike/{id}', [
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);

    Route::get('/discussion/watch/{id}', [
        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch'
    ]);

    Route::get('/discussion/unwatch/{id}', [
        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch'
    ]);

    Route::get('/discussion/best/reply/{id}', [
        'uses' => 'RepliesController@best_answer',
        'as' => 'discussion.best.answer'
    ]);

});

Route::get('discussion/{slug}', [
    'uses' => 'DiscussionController@show',
    'as' => 'discussion'
]);

Route::get('/channel/{slug}', [
    'uses' => 'ForumsController@channel',
    'as' => 'channel'
]);