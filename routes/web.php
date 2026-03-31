<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function(){
    return "This is '/page'";
});

Route::get('/index', [App\Http\Controllers\MyPlaceController::class,'index']);
