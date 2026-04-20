<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\HomController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
});


//Route::get('/', [HomController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/main', [MainController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/index', [MyPlaceController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/post', [App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('post.index');
Route::get('/create', [App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('post.create');
Route::post('post', [App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('post.store');
Route::get('post/{post}', [App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('post.show');
Route::get('post/{post}/edit', [App\Http\Controllers\Post\EditController::class, '__invoke'])->name('post.edit');
Route::patch('post/{post}', [App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('post.update');
Route::delete('/post/{post}', [App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('post.destroy');

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
