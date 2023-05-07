<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TestController;
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

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware('roles:admin,Chief-editor,Editor')->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
});

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('test', [TestController::class, '__invoke']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
