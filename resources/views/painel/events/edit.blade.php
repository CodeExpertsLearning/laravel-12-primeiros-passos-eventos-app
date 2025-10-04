@extends('layouts.painel')

@section('body')
    <div class="w-full mb-10">
        <a href="{{ route('painel.events.index') }}" class="underline">Eventos</a> &raquo; <strong>Editar Evento</strong>
    </div>

    <div class="w-full">
        <form action="{{ route('painel.events.update', ['event' => $event->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-full mb-6">
                <label for="title">Titulo Evento</label>
                <input type="text" name="title" value="{{ $event->title }}" id="title"
                    class="w-full border border-gray-800 rounded p-1">

                @error('title')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="description">Descrição</label>
                <input type="text" name="description" value="{{ $event->description }}" id="description"
                    class="w-full border border-gray-800 rounded p-1">

                @error('description')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="body">Conteúdo</label>
                <textarea name="body" id="body" class="w-full border border-gray-800 rounded p-1">{{ $event->body }}</textarea>
                @error('body')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="status">Status</label>
                <select name="status" id="status" class="w-full border border-gray-800 rounded p-1">
                    <option value="">Selecione Status</option>
                    <option value="ACTIVE" @selected($event->status->name == 'ACTIVE')>ATIVO</option>
                    <option value="INACTIVE" @selected($event->status->name == 'INACTIVE')>INATIVO</option>
                    <option value="DRAFT" @selected($event->status->name == 'DRAFT')>RASCUNHO</option>
                </select>
                @error('status')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="start_event">Inicio Evento</label>
                <input type="text" name="start_event" value="{{ $event->start_event->format('d/m/Y H:i:s') }}"
                    id="start_event" class="w-full border border-gray-800 rounded p-1">
                @error('start_event')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="end_event">Encerramento Evento</label>
                <input type="text" name="end_event" value="{{ $event->end_event->format('d/m/Y H:i:s') }}"
                    id="end_event" class="w-full border border-gray-800 rounded p-1">
                @error('end_event')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="cover">Capa Evento</label>

                @if ($event->cover)
                    <img src="{{ asset('storage/' . $event->cover) }}"
                        class="p-1 border border-gray-300 bg-white shadow my-2"
                        alt="Imagem capa evento: {{ $event->title }}">
                @endif

                <input type="file" name="cover" id="cover" class="w-full border border-gray-800 rounded p-1">

                @error('cover')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-green">
                Atualizar
            </button>
        </form>
    </div>
    @include('includes.script-format')
@endsection
