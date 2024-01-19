<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//generic all-in route
Route::resource('user', 'UserController');
//specific custom routes
Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create'); //view
Route::get('user/{id}', 'UserController@store');
Route::get('user/{id}/edit', 'UserController@edit'); //view
Route::post('user', 'UserController@create');
Route::patch('user/{id}', 'UserController@update'); //or put
Route::delete('user/{id}', 'UserController@destroy');
