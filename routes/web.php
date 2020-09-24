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
});

Route::get('/about','GuestController@about');
Route::get('/services','GuestController@services');
Route::get('/home', 'GuestController@index')->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/poll/search','GuestController@pollSearch')->name('poll.search');
    Route::get('/poll/submitSearch/','GuestController@submitSearch')->name('submit.search');
});

Auth::routes();
