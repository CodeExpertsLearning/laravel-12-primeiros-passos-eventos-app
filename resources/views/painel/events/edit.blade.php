@extends('layouts.painel')

@section('body')
    <div class="w-full mb-10">
        <a href="{{ route('painel.events.index') }}" class="underline">Eventos</a> &raquo; <strong>Editar Evento</strong>
    </div>

    <div class="w-full">
        <form action="{{ route('painel.events.update', ['event' => $event->id]) }}" method="POST">
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
                <label for="slug">Slug</label>
                <input type="text" name="slug" value="{{ $event->slug }}" id="slug"
                    class="w-full border border-gray-800 rounded p-1">
                @error('slug')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="start_event">Inicio Evento</label>
                <input type="text" name="start_event" value="{{ $event->start_event }}" id="start_event"
                    class="w-full border border-gray-800 rounded p-1">
                @error('start_event')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="end_event">Encerramento Evento</label>
                <input type="text" name="end_event" value="{{ $event->end_event }}" id="end_event"
                    class="w-full border border-gray-800 rounded p-1">
                @error('end_event')
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
@endsection
