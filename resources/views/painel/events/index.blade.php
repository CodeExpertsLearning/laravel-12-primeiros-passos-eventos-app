@extends('layouts.painel')

@section('body')
    <div class="w-full mb-10 flex justify-between">
        <h2 class="text-2xl font-bold">Eventos</h2>
        <a href="{{ route('painel.events.create') }}" class="btn btn-green">Criar Evento</a>
    </div>

    <table class="w-full mb-10">
        <thead>
            <tr>
                <th class="px-6 py-2 text-left font-bold">#</th>
                <th class="px-6 py-2 text-left font-bold">Evento</th>
                <th class="px-6 py-2 text-left font-bold">Começa em</th>
                {{-- <th>Status</th> --}}
                <th class="px-6 py-2 text-left font-bold">Criado em</th>
                <th class="px-6 py-2 text-left font-bold">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td class="px-6 py-2 text-left">{{ $event->id }}</td>
                    <td class="px-6 py-2 text-left">{{ $event->title }}</td>
                    <td class="px-6 py-2 text-left">{{ $event->start_event }}</td>
                    {{-- <td>{{ $event->is_active }}</td> --}}
                    <td class="px-6 py-2 text-left">{{ $event->created_at }}</td>
                    <td class="flex gap-2 px-6 py-2 text-left">
                        <a href="{{ route('painel.events.edit', ['event' => $event->id]) }}" class="btn btn-blue">EDITAR</a>

                        <form action="{{ route('painel.events.destroy', ['event' => $event->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red">DELETAR</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}
@endsection
