<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct(private Event $event) {}

    public function index()
    {
        $events = $this->event->paginate(10);

        return view('painel.events.index', compact('events'));
    }

    public function show(int $event)
    {
        $event = $this->event->findOrFail($event);

        return view('painel.events.show', compact('event'));
    }

    public function create()
    {
        return view('painel.events.create');
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $this->event->create($data);

        return redirect()->route('painel.events.index');
    }

    public function edit(int $event)
    {
        $event = $this->event->findOrFail($event);

        return view('painel.events.edit', compact('event'));
    }

    public function update(EventRequest $request, int $event)
    {
        $data = $request->validated();

        $event = $this->event->findOrFail($event);
        $event->update($data);

        return redirect()->back();
    }

    public function destroy(int $event)
    {
        $event = $this->event->findOrFail($event);
        $event->delete();

        return redirect()->back();
    }
}
