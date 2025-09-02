<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get(
//     '/events/{event?}',
//     [\App\Http\Controllers\Painel\EventsController::class, 'show']
// );

// Route::post($uri, $action);
// Route::put($uri, $action);
// Route::patch($uri, $action);
// Route::delete($uri, $action);

//Route::match(['GET', 'POST'], '/ok', fn() => 'Hello');
// Route::any('/ok', fn() => 'Hello');




Route::prefix('painel')->name('painel.')->group(function () {

    // Route::prefix('events')
    //     ->name('events.')
    //     ->controller(\App\Http\Controllers\Painel\EventsController::class)
    //     ->group(function () {

    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::get('/{event}', 'show')->name('show');
    //         Route::post('/store', 'store')->name('store');
    //         Route::get('/{event}/edit', 'edit')->name('edit');
    //         Route::put('/{event}', 'update')->name('update');
    //         Route::delete('/{event}', 'destroy')->name('destroy');
    //     });

    Route::resource(
        'events',
        \App\Http\Controllers\Painel\EventsController::class
    );
});
