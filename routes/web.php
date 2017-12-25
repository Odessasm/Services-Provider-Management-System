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


Auth::routes();
Route::get('/', 'PeopleProviderController@getHomeView' )->name('getHomeView');
Route::group(['middleware' => 'auth'] , function(){
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'user'], function(){
Route::get('/profile', 'PeopleController@getUserProfile')->name('getUserProfile');
Route::post('/profile', 'PeopleController@postUserProfile')->name('postUserProfile');
});

Route::group(['prefix' => 'provider'], function(){
Route::get('/profile', 'ProviderController@getProviderProfile')->name('getProviderProfile');
Route::post('/profile', 'ProviderController@postProviderProfile')->name('postProviderProfile');
});


});





/*






Route::group(['prefix' => 'judge',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );

	Route::get('/', function () {
    	return view('welcome');
	});

});


Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );
});


Route::group(['prefix' => 'judge',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );
});*/