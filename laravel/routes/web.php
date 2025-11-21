<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PlayerController;

Route::resource('/players', PlayerController::class,);
Route::get('/regenerate', [PlayerController::class, 'regenerate']);

