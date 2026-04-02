<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function(){
    return "This is '/page'";
});

// Одиночный маршрут
Route::get('/index', [MyPlaceController::class, 'index']);

// Группа маршрутов для PostController
Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'indexFunction');
    Route::get('/post/create', 'create');
    Route::get('/post/update', 'update');
    Route::get('/post/delete', 'delete');
    Route::get('/post/first_or_create', 'firstOrCreate');
});
