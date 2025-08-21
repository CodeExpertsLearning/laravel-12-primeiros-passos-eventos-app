<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function show(string $event)
    {
        /*
         \DB::listen(fn($db) => dump($db));

        dd(\App\Models\User::all());
        */

        $users = \App\Models\User::all();

        //php.net/compact
        return view('painel.events.index', compact('event', 'users'));
    }
}
