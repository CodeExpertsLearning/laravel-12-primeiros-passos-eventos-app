@extends('layouts.painel')

@section('body')
    <div>
        <h2>{{ $event->title }}</h2>
        <hr>
        <p>
            {{ $event->body }}
        </p>
    </div>
@endsection
