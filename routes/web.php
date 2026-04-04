<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);


// Route::get('/', function () {
//     return view('Components.layout');
// });


Route::get('/page', function () {
    return "This is '/page'";
});

Route::get('/index', [MyPlaceController::class, 'index']);

Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'indexFunction');
    Route::get('/post/create', 'create');
    Route::get('/post/update', 'update');
    Route::get('/post/delete', 'delete');
    Route::get('/post/first_or_create', 'firstOrCreate');
});
