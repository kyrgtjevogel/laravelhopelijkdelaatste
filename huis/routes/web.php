<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
Route::get('huis', [App\Http\Controllers\HuisController::class, 'index']);
Route::get('huis/create', [App\Http\Controllers\HuisController::class, 'create']);
Route::post('huis/store', [App\Http\Controllers\HuisController::class, 'store']);
Route::get('huis/edit/{id}',   [App\Http\Controllers\HuisController::class,'edit']);
Route::get('huis/{id}/beschrijving', [App\Http\Controllers\HuisController::class, 'showDescriptionPage']);
Route::post('huis/destroy/{id}',  [App\Http\Controllers\HuisController::class, 'destroy']);
Route::post('huis/update/{id}',   [App\Http\Controllers\HuisController::class, 'update']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
