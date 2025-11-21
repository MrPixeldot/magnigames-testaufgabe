<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/regenerate', [PlayerController::class, 'regenerate']);
