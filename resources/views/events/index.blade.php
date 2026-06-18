<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-base-content">Eventos</h1>
                <p class="text-base-content/50 mt-1">Encontre o próximo evento para você</p>
            </div>
            @auth
                @if(Auth::user()->role === 'organizer')
                    <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm shadow-md">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Novo evento
                    </a>
                @endif
            @endauth
        </div>

        <!-- Filtros de categoria -->
        @isset($categories)
            <div class="flex flex-wrap gap-2 mb-10">
                <a href="{{ route('events.index') }}"
                   class="badge badge-lg font-medium cursor-pointer transition-all duration-200
                    {{ !request('category') ? 'badge-primary text-primary-content' : 'badge-ghost hover:badge-primary hover:text-primary-content' }}">
                    Todos
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('events.index', ['category' => $category->id]) }}"
                       class="badge badge-lg font-medium cursor-pointer transition-all duration-200
                        {{ request('category') == $category->id ? 'badge-primary text-primary-content' : 'badge-ghost hover:badge-primary hover:text-primary-content' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endisset

        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success mb-8 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error mb-8 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Grid de eventos -->
        @if($events->isEmpty())
            <div class="text-center py-32 text-base-content/40">
                <svg class="w-20 h-20 mx-auto mb-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                <p class="text-xl font-medium">Nenhum evento encontrado</p>
                <p class="text-sm mt-2">Tente outra categoria ou volte em breve</p>
            </div>
        @else
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($events as $event)
                    <a href="{{ route('events.show', $event) }}" class="card bg-base-100 shadow-md hover:shadow-2xl transition-all duration-300 border border-base-200 group transform hover:-translate-y-1">
                        @if($event->banner_path)
                            <figure class="overflow-hidden">
                                <img src="{{ asset('storage/' . $event->banner_path) }}" alt="{{ $event->title }}" class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </figure>
                        @else
                            <div class="h-48 flex items-center justify-center bg-base-200">
                                <svg class="w-10 h-10 text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                            </div>
                        @endif
                        <div class="card-body gap-2 p-5">
                            <span class="badge badge-ghost text-xs font-medium">{{ optional($event->category)->name ?? 'Sem categoria' }}</span>
                            <h2 class="font-semibold text-lg group-hover:text-primary transition-colors">{{ $event->title }}</h2>
                            <p class="text-sm text-base-content/60 line-clamp-2">{{ Str::limit($event->description, 90) }}</p>
                            <div class="flex items-center justify-between mt-3 text-xs text-base-content/50">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $event->location }}
                                </span>
                                <span>{{ $event->participants->count() }}/{{ $event->capacity }} vagas</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</x-app-layout>