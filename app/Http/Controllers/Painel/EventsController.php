<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function __construct(private Event $event) {}

    public function index()
    {
        $events = $this->event->orderBy('id', 'DESC')->paginate(10);

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

        if(isset($data['cover']))
            $data['cover'] = $data['cover']->store('events', 'public');

        $this->event->create($data);

        session()->flash('success', 'Evento criado com sucesso!');
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

        if(isset($data['cover'])) {
            $disk = Storage::disk('public');

            if($event->cover && $disk->exists($event->cover))
                $disk->delete($event->cover);

            $data['cover'] = $data['cover']->store('events', 'public');
        }

        $event->update($data);

        session()->flash('success', 'Evento atualizado com sucesso!');
        return redirect()->back();
    }

    public function destroy(int $event)
    {
        $event = $this->event->findOrFail($event);

        $disk = Storage::disk('public');
        if($event->cover && $disk->exists($event->cover))
            $disk->delete($event->cover);

        $event->delete();

        session()->flash('success', 'Evento removido com sucesso!');
        return redirect()->back();
    }
}
