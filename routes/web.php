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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tours', 'App\Http\Controllers\TourController@index')->name('tour.index');
Route::get('/tours/create', 'App\Http\Controllers\TourController@create')->name('tour.create');
Route::post('/tours/create', 'App\Http\Controllers\TourController@store')->name('tour.store');
Route::get('/tours/{tour}', 'App\Http\Controllers\TourController@show')->name('tour.show'); 
Route::get('/tours/{tour}/edit', 'App\Http\Controllers\TourController@edit')->name('tour.edit');
Route::patch('/tours/{tour}', 'App\Http\Controllers\TourController@update')->name('tour.update'); 
Route::delete('/tours/{tour}', 'App\Http\Controllers\TourController@destroy')->name('tour.destroy'); 

Route::get('/tours/update', 'App\Http\Controllers\TourController@update');
Route::get('/tours/delete', 'App\Http\Controllers\TourController@delete');
Route::get('/tours/first_or_create', 'App\Http\Controllers\TourController@firstOrCreate');
Route::get('/tours/update_or_create', 'App\Http\Controllers\TourController@updateOrCreate');