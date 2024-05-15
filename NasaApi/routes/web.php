<?php

use App\Http\Controllers\NasaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');

});
Route::get('/', [App\Http\Controllers\NasaController::class, 'main']);
Route::get('/dailyPictures', [App\Http\Controllers\Dailypicture::class, 'dailyPictures']);
