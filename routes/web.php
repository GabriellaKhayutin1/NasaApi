<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dailypicture;
use App\Http\Controllers\NasaController;

Route::get('/', [NasaController::class, 'index']);
Route::get('/daily-pictures', [Dailypicture::class, 'daily']);
Route::get('/picture/{date}', [Dailypicture::class, 'show'])->name('picture.show');
Route::get('/trigger-500', function () {
    throw new \Exception('This is a simulated server error.');
});






