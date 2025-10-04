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
                <th class="px-6 py-2 text-left font-bold">Status</th>
                <th class="px-6 py-2 text-left font-bold">Criado em</th>
                <th class="px-6 py-2 text-left font-bold">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td class="px-6 py-2 text-left">{{ $event->id }}</td>
                    <td class="px-6 py-2 text-left">{{ $event->title }}</td>
                    <td class="px-6 py-2 text-left">{{ $event->start_event->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-2 text-left">
                        <span class="{{ $event->status->color() }} font-bold p-1 rounded">
                            {{ $event->status->label() }}
                        </span>
                    </td>
                    <td class="px-6 py-2 text-left">{{ $event->created_at->diffForHumans() }}</td>
                    <td class="flex gap-2 px-6 py-2 text-left">
                        <a href="{{ route('painel.events.edit', ['event' => $event->id]) }}" class="btn btn-blue">EDITAR</a>

                        <form action="{{ route('painel.events.destroy', ['event' => $event->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red cursor-pointer" id="btnRemoveEvent">DELETAR</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}

    @push('scripts')
        <script>
            const btnRemoveEvent = document.querySelectorAll('button#btnRemoveEvent')

            btnRemoveEvent.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    if (!confirm('Você deseja realmente deletar este evento?')) {
                        e.preventDefault()
                    }
                })
            })
        </script>
    @endpush
@endsection
