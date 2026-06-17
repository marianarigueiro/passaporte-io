<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Cabeçalho --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-base-content">Eventos</h1>
            <p class="text-base-content/50 text-sm mt-0.5">Encontre o próximo evento para você</p>
        </div>
        @auth
            @if(Auth::user()->role === 'organizer')
                <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm font-medium shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Criar evento
                </a>
            @endif
        @endauth
    </div>

    {{-- Filtros de categoria (RF13) --}}
    @isset($categories)
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('events.index') }}"
               class="badge badge-lg font-medium cursor-pointer transition-colors
                {{ !request('category') ? 'badge-primary' : 'badge-ghost hover:badge-primary' }}">
                Todos
            </a>
            @foreach($categories as $category)
                <a href="{{ route('events.index', ['category' => $category->id]) }}"
                   class="badge badge-lg font-medium cursor-pointer transition-colors
                    {{ request('category') == $category->id ? 'badge-primary' : 'badge-ghost hover:badge-primary' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    @endisset

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success mb-6 text-sm">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error mb-6 text-sm">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Grid de eventos --}}
    @if($events->isEmpty())
        <div class="text-center py-24 text-base-content/40">
            <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
            <p class="text-base font-medium">Nenhum evento encontrado</p>
            <p class="text-sm mt-1">Tente outra categoria ou volte em breve</p>
        </div>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($events as $event)
                <a href="{{ route('events.show', $event) }}" class="card bg-base-100 shadow-sm hover:shadow-md transition-shadow border border-base-200 group">

                    @if($event->banner_path)
                        <figure class="overflow-hidden">
                            <img src="{{ asset('storage/' . $event->banner_path) }}"
                                 class="h-44 w-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 alt="{{ $event->title }}">
                        </figure>
                    @else
                        <div class="h-44 flex items-center justify-center" style="background: linear-gradient(135deg, #EEF2FF, #E0E7FF);">
                            <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                    @endif

                    <div class="card-body gap-2 p-5">

                        @if($event->category)
                            <span class="badge badge-ghost text-xs font-medium">{{ $event->category->name }}</span>
                        @endif

                        <h2 class="font-semibold text-base-content text-base leading-snug group-hover:text-primary transition-colors">
                            {{ $event->title }}
                        </h2>

                        <p class="text-sm text-base-content/60 line-clamp-2">
                            {{ Str::limit($event->description, 90) }}
                        </p>

                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center gap-1 text-xs text-base-content/40">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $event->location }}
                            </div>
                            <span class="text-xs text-base-content/40">
                                {{ $event->participants->count() }}/{{ $event->capacity }} vagas
                            </span>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

        {{-- Paginação (RNF05) --}}
        <div class="mt-10">
            {{ $events->links() }}
        </div>
    @endif

</div>

</x-app-layout>