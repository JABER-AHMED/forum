<?php

Route::get('/error', function(){

	return view('error');

});

Route::get('/discuss', function(){

	return view('discuss');

});

Route::get('/forum', 'ForumsController@index')->name('forum');


Route::group(['middleware' => 'visitor'], function(){

	Route::get('/register', 'RegisterController@register')->name('register');
	Route::post('/register', 'RegisterController@postRegister')->name('user.register');
	Route::get('/', 'LoginController@login')->name('login');
	Route::post('/login', 'LoginController@postLogin')->name('user.login');

});

Route::post('/logout', 'LoginController@logout')->name('logout');

Route::get('{provider}/auth', 'SocialController@auth')->name('social.auth');
// Route::get('/{provider}/redirect', 'SocialController@github_callback')->name('social.callback');

Route::get('admin/index', 'AdminController@admin')->middleware('admin');
Route::get('/home', 'Authcontroller@auth')->middleware('authinticate');



//Channel Routes
Route::get('/channel/index', 'ChannelController@index')->middleware('admin')->name('channel.index');
Route::get('/channel/create', 'ChannelController@create')->middleware('admin')->name('channel.create');
Route::post('/channel/store', 'ChannelController@store')->middleware('admin')->name('channel.store');
Route::get('/channel/edit/{id}', 'ChannelController@edit')->middleware('admin')->name('channel.edit');
Route::post('/channel/update/{id}', 'ChannelController@update')->middleware('admin')->name('channel.update');
Route::get('/channel/delete/{id}', 'ChannelController@delete')->middleware('admin')->name('channel.delete');

//Discussion Routes
Route::get('/discussion/create/new', 'DiscussionController@create')->name('discussion.create');
Route::post('/discussion/store', 'DiscussionController@store')->name('discussion.store');
Route::get('/discussion/{slug}', 'DiscussionController@show')->name('discussion');
Route::post('/discussion/reply/{id}', 'DiscussionController@reply')->name('discussion.reply');
Route::get('/discussions/edit/{slug}', 'DiscussionController@edit')->name('discussion.edit');
Route::post('/discussions/update/{id}', 'DiscussionController@update')->name('discussion.update');


//Like Routes
Route::get('/reply/like/{id}', 'RepliesController@like')->name('reply.like');
Route::get('/reply/unlike/{id}', 'RepliesController@unlike')->name('reply.unlike');
Route::get('/reply/edit/{id}', 'RepliesController@edit')->name('reply.edit');
Route::post('/reply/update/{id}', 'RepliesController@update')->name('reply.update');

//channel routes
Route::get('/channel/{slug}', 'ForumsController@channel')->name('channel');

Route::get('/discussion/watch/{id}', 'WatchersController@watch')->name('discussion.watch');
Route::get('/discussion/unwatch/{id}', 'WatchersController@unwatch')->name('discussion.unwatch');

Route::get('/discussion/best/reply/{id}', 'RepliesController@best_answer')->name('discussion.best.answer');

//Profile route
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_profile')->name('user.profile');


