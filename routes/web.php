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

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes([
    'confirm' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('get-logout');

Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('test', \App\Http\Controllers\TestController::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
