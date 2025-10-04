<x-layouts.home>
    <div class="w-full py-4 border-b border-gray-400">
        @if ($event->cover)
            <div class="w-full mb-4">
                <img src="{{ asset('storage/' . $event->cover) }}" class="w-full h-[280px]"
                    alt="Imagem capa evento: {{ $event->title }}">
            </div>
        @endif
        <h2 class="font-thin text-4xl block mb-4 capitalize">{{ $event->title }}</h2>
        <p class="block mb-4">
            {{ $event->description }}
        </p>
        <strong class="block mb-4">
            Acontece em {{ $event->start_event->format('d/m/Y H:i') }} e
            encerra em {{ $event->end_event->format('d/m/Y H:i') }}
        </strong>
    </div>
    <div class="w-full py-4 body-single">
        {!! $event->body !!}
    </div>
</x-layouts.home>
