<?php

namespace App\Http\Controllers;

use App\Enums\EventStatus;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::whereDate('start_event', '>=', now())
            ->whereStatus(EventStatus::ACTIVE)
            ->paginate(15);

        return view('home.index', compact('events'));
    }

    public function single(Event $event)
    {
        return view('home.single', compact('event'));
    }
}
