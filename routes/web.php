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
	
    return redirect('home');
 
});

Route::get('/game', 'HomeController@game')->name('game');
 
Route::get('/logout', 'databaseController@logout');
 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/public', 'databaseController@hall'); 
Route::post('/score', 'databaseController@score'); 
Route::resource('/submit', 'databaseController');
/*
Route::get('/send/email', 'databaseController@mail');

Route::get('setlocale/{locale}', function ($locale) {
 
  if (in_array($locale, \Config::get('app.locales'))) {
    Session::put('locale', $locale);
 
  }
  return redirect()->back();
});*/


 
