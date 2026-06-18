<x-app-layout>
    <!-- HERO -->
    <section class="gradient-hero text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-sm font-medium mb-6 backdrop-blur-sm">
                    Plataforma de eventos
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                    Descubra eventos que <br class="hidden sm:block" /> combinam com você
                </h1>
                <p class="mt-6 text-lg text-white/80 max-w-xl">
                    Explore, participe e crie eventos em um sistema simples, moderno e organizado.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-md shadow-lg shadow-primary/20">
                        Explorar eventos
                        <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-outline btn-md border-white text-white hover:bg-white hover:text-primary transition-colors">
                        Criar conta grátis
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- ESTATÍSTICAS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-shadow">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-base-content/60 uppercase tracking-wider">Eventos ativos</h3>
                        <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-base-content mt-3">{{ \App\Models\Event::count() }}</p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-shadow">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-base-content/60 uppercase tracking-wider">Eventos futuros</h3>
                        <div class="w-8 h-8 rounded-full bg-secondary/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-base-content mt-3">{{ \App\Models\Event::where('date_time', '>=', now())->count() }}</p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-shadow">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-base-content/60 uppercase tracking-wider">Organizadores</h3>
                        <div class="w-8 h-8 rounded-full bg-accent/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-base-content mt-3">{{ \App\Models\Event::distinct('user_id')->count('user_id') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LISTA DE ÚLTIMOS EVENTOS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-base-content">Últimos eventos</h2>
                <p class="text-base-content/50 mt-2">Atualizados recentemente na plataforma</p>
            </div>
            <a href="{{ route('events.index') }}" class="btn btn-ghost text-primary hover:bg-primary/10 transition-colors">
                Ver todos <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($events as $event)
                <div class="card card-event bg-base-100 border border-base-200 transition-all duration-300 group">
                    @if($event->banner_path)
                        <figure class="overflow-hidden">
                            <img src="{{ asset('storage/'.$event->banner_path) }}" alt="{{ $event->title }}" class="h-52 w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </figure>
                    @endif
                    <div class="card-body p-5">
                        <span class="badge badge-sm badge-outline text-xs font-medium">{{ optional($event->category)->name }}</span>
                        <h3 class="card-title text-lg font-semibold mt-2 group-hover:text-primary transition-colors">{{ $event->title }}</h3>
                        <p class="text-sm text-base-content/70 line-clamp-2">{{ Str::limit($event->description, 120) }}</p>
                        <div class="flex items-center justify-between mt-4 text-xs text-base-content/50">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $event->location }}
                            </span>
                            <span>{{ \Carbon\Carbon::parse($event->date_time)->format('d/m/Y') }}</span>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary btn-sm btn-outline group-hover:btn-primary transition-colors">Detalhes</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 text-base-content/40">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                    <p class="text-lg font-medium">Nenhum evento por aqui ainda.</p>
                </div>
            @endforelse
        </div>
    </section>
</x-app-layout>