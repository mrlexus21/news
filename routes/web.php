<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\News\Admin\CategoryController;
use App\Http\Controllers\News\Admin\NewsController;
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

$groupData = [
    'prefix' => 'admin',
    'middleware' => ['auth', 'roles:admin,Chief-editor,Editor']
];
Route::group($groupData, function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', CategoryController::class)
        ->names('admin.categories')->middleware(['auth', 'roles:admin,Chief-editor,Editor']);

    Route::resource('posts', NewsController::class)
        ->names('admin.posts')->middleware(['auth', 'roles:admin,Chief-editor,editor']);
});

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/category/{category:slug}', [IndexController::class, 'category'])->name('category');
Route::get('/category/{category:slug}/post/{post:slug}', [IndexController::class, 'newsPost'])->name('newspost');

Route::get('test', [TestController::class, '__invoke'])->name('test');
