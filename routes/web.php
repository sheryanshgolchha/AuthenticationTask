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

Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/registerSubmit', [App\Http\Controllers\UserController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/verify/{token}', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/loginSubmit', [App\Http\Controllers\UserController::class, 'loginSubmit'])->name('loginSubmit');

