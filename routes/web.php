<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; //as of Laravel 10
use App\Http\Controllers\Auth\LoginController; //as of Laravel 10

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
// Route::resource('user', UserController::class);
//specific custom routes
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('user', [UserController::class, 'index'])->name('users.index');
Route::get('user/create', [UserController::class, 'create'])->name('users.create'); //view
Route::get('user/{id}', [UserController::class, 'show']);
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); //view
Route::post('user', [UserController::class, 'store']);
Route::put('user/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
