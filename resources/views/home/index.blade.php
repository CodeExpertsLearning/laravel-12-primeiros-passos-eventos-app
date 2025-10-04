<x-layouts.home>
    <div class="w-full mb-8">
        <h1 class="font-bold text-2xl block my-4 pb-2 border-b border-gray-500">
            Eventos Experts
        </h1>
    </div>
    <div class="w-full">
        @forelse($events as $event)
            <div class="w-full py-4 border-b border-gray-400">
                <h2 class="font-thin text-4xl block mb-4 capitalize">{{ $event->title }}</h2>
                <p class="block mb-4">
                    {{ $event->description }}
                </p>
                <strong class="block mb-4">Acontece em {{ $event->start_event->format('d/m/Y H:i') }}</strong>
                <a href="{{ route('home.single', ['event' => $event->slug]) }}"
                    class="font-bold text-xl text-green-700
                                    hover:underline">Ver
                    mais</a>
            </div>
        @empty
            <h3 class="block text-3xl font-extrabold my-8">
                Sem eventos cadastrados!
            </h3>
        @endforelse

        <div class="w-full mt-20">
            {{ $events->links('pagination::simple-tailwind') }}
        </div>
    </div>
</x-layouts.home>
