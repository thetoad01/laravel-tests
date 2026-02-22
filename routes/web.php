<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/bitcoin-price', 'bitcoin.index')->name('bitcoin-price.index');
Route::post('/waitlist', 'Waitlist\WaitlistController@store')->name('waitlist.store');

Route::view('/old-stuff', 'old-stuff')->name('old-stuff');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*******************************************************************
 * Open Weather
 *******************************************************************/
Route::get('/weather', 'Weather\OpenweatherController@index')->name('weather.index');

/*******************************************************************
 * NHTSA VIN Decode
 *******************************************************************/
Route::get('/nhtsa', 'Nhtsa\NhtsaController@index')->name('nhtsa.index');
Route::get('/nhtsa/update', 'Nhtsa\NhtsaController@update')->name('nhtsa.update');
Route::get('/nhtsa/{id}', 'Nhtsa\NhtsaController@show')->name('nhtsa.show');
Route::post('/nhtsa', 'Nhtsa\NhtsaController@store')->name('nhtsa.store');
Route::get('/nhtsa/decode/{vin}/{year?}', 'Nhtsa\NhtsaController@decode')->name('nhtsa.decode');


/*******************************************************************
 * Generic Pages
 *******************************************************************/
Route::view('/success', 'pages.success')->name('success');


/*******************************************************************
 * Tailwind CSS
 *******************************************************************/
Route::view('/tailwind', 'tailwind.index')->name('tailwind.index');
Route::view('/tailwind/tweet', 'tailwind.tweet')->name('tailwind.tweet');
Route::view('/tailwind/github', 'tailwind.github')->name('tailwind.github');
Route::view('/tailwind/kanban', 'tailwind.kanban')->name('tailwind.kanban');
Route::view('/tailwind/homepage', 'tailwind.homepage')->name('tailwind.homepage');
Route::view('/tailwind/dashboard', 'tailwind.dashboard')->name('tailwind.dashboard');
Route::view('/tailwind/blog', 'tailwind.blog')->name('tailwind.blog');
