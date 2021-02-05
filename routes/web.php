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

Route::get('/', 'App\Http\Controllers\StudentController@index');
Route::post('/', 'App\Http\Controllers\StudentController@store');
Route::delete('/{student}', 'App\Http\Controllers\StudentController@destroy');
Route::get('/{student}/edit', 'App\Http\Controllers\StudentController@edit');
Route::patch('/{student}', 'App\Http\Controllers\StudentController@update');


Route::resource('/', 'App\Http\Controllers\StudentController');

