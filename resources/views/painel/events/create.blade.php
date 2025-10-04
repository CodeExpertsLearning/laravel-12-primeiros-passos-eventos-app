@extends('layouts.painel')

@section('body')
    <div class="w-full mb-10">
        <a href="{{ route('painel.events.index') }}" class="underline">Eventos</a> &raquo; <strong>Criar Evento</strong>
    </div>
    <div class="w-full">
        <form action="{{ route('painel.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w-full mb-6">
                <label for="title">Titulo Evento</label>
                <input type="text" name="title" value="{{ old('title') }}" id="title"
                    class="w-full border border-gray-800 rounded p-1">

                @error('title')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="description">Descrição</label>
                <input type="text" name="description" value="{{ old('description') }}" id="description"
                    class="w-full border border-gray-800 rounded p-1">

                @error('description')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="body">Conteúdo</label>
                <textarea name="body" id="body" class="w-full border border-gray-800 rounded p-1">{{ old('body') }}</textarea>
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
                    <option value="ACTIVE">ATIVO</option>
                    <option value="INACTIVE">INATIVO</option>
                    <option value="DRAFT">RASCUNHO</option>
                </select>
                @error('status')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="start_event">Inicio Evento</label>
                <input type="text" name="start_event" value="{{ old('start_event') }}" id="start_event"
                    class="w-full border border-gray-800 rounded p-1">
                @error('start_event')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="end_event">Encerramento Evento</label>
                <input type="text" name="end_event" value="{{ old('end_event') }}" id="end_event"
                    class="w-full border border-gray-800 rounded p-1">
                @error('end_event')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label for="cover">Capa Evento</label>

                <input type="file" name="cover" id="cover" class="w-full border border-gray-800 rounded p-1">

                @error('cover')
                    <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-green">
                Salvar
            </button>
        </form>
    </div>

    @include('includes.script-format')
@endsection
