<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::get('tags/{tags}','TagsController@show');

Route::group(['middleware' => ['web']], function () {
    // Here like
	/*Route::get('articles','ArticlesControlles@index');
	Route::get('articles/create','ArticlesControlles@create');
	Route::get('articles/{id}','ArticlesControlles@show');
	Route::post('articles','ArticlesControlles@store');
	Route::get('articles/{id}/edit','ArticlesControlles@edit');*/
	Route::resource('articles','ArticlesControlles');
	

    Route::auth();

    Route::get('/home', 'HomeController@index');
});

/*Route::group(['middleware' => ['manager']], function () {
	Route::get('foo', function(){
		return 'Some text here';
	});
});*/

Route::get('foo', ['middleware' => ['auth', 'manager'], function()
{
    return 'this page may only be viewed by managers';
}]);