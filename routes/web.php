<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check())
        return redirect()->intended('dashboard');

    return view('login');
})->name('login');

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::post('/authenticate', [LoginController::class, 'authenticate']);