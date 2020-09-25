<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','GuestController@index')->name('home');
Route::group(['prefix' => 'admin/'], function () {
    Route::resource('poll', 'AdminController');
    Route::get('','UserController@profile')->name('admin.profile');
    Route::get('view/{poll_id}/Result','AdminController@viewResult')->name('view.result');
});

Route::get('/about','GuestController@about');
Route::get('/services','GuestController@services');
Route::get('/home', 'GuestController@index')->name('home');

Route::group(['prefix' => 'poll/'], function () {
    Route::get('search','GuestController@pollSearch')->name('poll.search');
    Route::get('submit/Search/','GuestController@submitSearch')->name('submit.search');
    Route::get('submit/{poll_id}/result/','GuestController@submitResult')->name('submit.result');

});

Auth::routes();
