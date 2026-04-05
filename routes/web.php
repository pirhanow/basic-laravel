<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


// Route::get('/', function () {
//     return view('Components.layout');
// });


Route::get('/page', function () {
    return "This is '/page'";
});

Route::get('/index', [MyPlaceController::class, 'index']);


Route::resource('post', PostController::class);
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::match(['put', 'patch'], 'post/{post}', [PostController::class, 'update'])->name('post.update');



// Route::controller(PostController::class)->group(function () {
//     Route::get('/post', 'index')->name('post.index');
//     Route::get('/create', 'create');
//     Route::get('/post', 'store')->name('post.store');


//     Route::get('/post/create', 'create');
//     Route::get('/post/update', 'update');
//     Route::get('/post/delete', 'delete');
//     Route::get('/post/first_or_create', 'firstOrCreate');
// });
