<?php
Route::get('category/{categoryid}', 'CategoryController@categoryid');
Route::get('topic/{topicid}', 'TopicController@topicid');
Route::get('login', 'SessionsController@create');
Route::get('register', 'SessionsController@register');
Route::post('threaddatabase', ['as' => 'threaddatabase', 'uses' => 'ThreadController@threaddatabase']);
Route::post('postdatabase', ['as' => 'postdatabase', 'uses' => 'PostController@postdatabase']);
Route::post('sessions/registerdatabase', ['as' => 'sessions.registerdatabase', 'uses' => 'SessionsController@registerdatabase']);
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');
	Route::resource('forums', 'ForumController');
Route::get('newtopic/{categoryid}/{id}', 'ThreadController@store');
Route::get('newpost/{topicid}/{id}', 'PostController@store');
Route::post('threaddestroy', ['as' => 'threaddestroy', 'uses' => 'CategoryController@threaddestroy']);
Route::post('postdestroy', ['as' => 'postdestroy', 'uses' => 'TopicController@postdestroy']);

/* in the routes above, a slash followed by {} tags indicated that there is something being passed as a parameter via the url, 
post means that it is posting variables from a form to a method in a controller 
*/
