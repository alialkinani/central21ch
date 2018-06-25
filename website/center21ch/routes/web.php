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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verify/{token}','VerifyController@verify')->name('verify');

Route::get('/poems', 'PoemsController@index')->name('poems');
Route::post('/poems', 'PoemsController@store')->name('createPoems');

Route::get('/poems/{poem}', 'PoemsController@show')->name('poem');
Route::post('/poems/{poem}/replies', 'RepliesController@store')->name('addReplies');

