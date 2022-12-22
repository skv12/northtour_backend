<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
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
Route::get('/tours', 'TourController@index')->name('tour.index');
Route::get('/tours/create', 'TourController@create')->name('tour.create');
Route::post('/tours/create', 'TourController@store')->name('tour.store');
Route::get('/tours/{tour}', 'TourController@show')->name('tour.show'); 
Route::get('/tours/{tour}/edit', 'TourController@edit')->name('tour.edit');
Route::patch('/tours/{tour}', 'TourController@update')->name('tour.update'); 
Route::delete('/tours/{tour}', 'TourController@destroy')->name('tour.destroy'); 