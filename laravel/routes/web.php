<?php

use App\Models\Player;

Route::get('/players', function () {
    return Player::all();
});

