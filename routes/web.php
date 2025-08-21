<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/events/{event?}',
    [\App\Http\Controllers\Painel\EventsController::class, 'show']
);

// Route::post($uri, $action);
// Route::put($uri, $action);
// Route::patch($uri, $action);
// Route::delete($uri, $action);

//Route::match(['GET', 'POST'], '/ok', fn() => 'Hello');
// Route::any('/ok', fn() => 'Hello');
