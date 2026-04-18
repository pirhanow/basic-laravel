<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\HomController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;


Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
});


//Route::get('/', [HomController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/main', [MainController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/index', [MyPlaceController::class, 'index']);

Route::get('/post', [App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('post.index');
Route::get('/create', [App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('post.create');
Route::post('post', [App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('post.store');
Route::get('post/{post}', [App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('post.show');
Route::get('post/{post}/edit', [App\Http\Controllers\Post\EditController::class, '__invoke'])->name('post.edit');
Route::patch('post/{post}', [App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('post.update');
Route::delete('/post/{post}', [App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('post.destroy');

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
