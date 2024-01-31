<?php

use App\Http\Controllers\PersonController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('people', PersonController::class);
Route::get('kaminski/44681/people/{id}', [PersonController::class, 'show']);
