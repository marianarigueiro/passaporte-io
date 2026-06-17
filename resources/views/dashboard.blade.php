<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success mb-6 text-sm">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Cabeçalho --}}
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-base-content">
            Olá, {{ Auth::user()->name }}
        </h1>
        <p class="text-base-content/50 text-sm mt-1">
            {{ Auth::user()->role === 'organizer' ? 'Painel do organizador' : 'Seus eventos e ingressos' }}
        </p>
    </div>

    {{-- Cards de métricas --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">

        @if(Auth::user()->role === 'organizer')
            <div class="card bg-base-100 border border-base-200 shadow-sm">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-base-content/50 font-medium">Meus eventos</span>
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-semibold text-base-content">{{ $myEventsCount ?? 0 }}</p>
                    <a href="{{ route('events.index') }}" class="text-xs text-primary font-medium mt-2 block hover:underline">
                        Ver todos →
                    </a>
                </div>
            </div>

            <div class="card bg-base-100 border border-base-200 shadow-sm">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-base-content/50 font-medium">Total de inscritos</span>
                        <div class="w-9 h-9 rounded-lg bg-secondary/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-semibold text-base-content">{{ $totalParticipants ?? 0 }}</p>
                    <p class="text-xs text-base-content/40 mt-2">Em todos os seus eventos</p>
                </div>
            </div>

            <div class="card bg-base-100 border border-base-200 shadow-sm">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-base-content/50 font-medium">Próximos eventos</span>
                        <div class="w-9 h-9 rounded-lg bg-success/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-semibold text-base-content">{{ $upcomingCount ?? 0 }}</p>
                    <p class="text-xs text-base-content/40 mt-2">Eventos futuros ativos</p>
                </div>
            </div>

        @else
            {{-- Participante --}}
            <div class="card bg-base-100 border border-base-200 shadow-sm">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-base-content/50 font-medium">Minhas inscrições</span>
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-semibold text-base-content">{{ $subscriptionsCount ?? 0 }}</p>
                    <p class="text-xs text-base-content/40 mt-2">Eventos que você vai participar</p>
                </div>
            </div>
        @endif

    </div>

    {{-- Ações rápidas --}}
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm font-medium shadow-sm">
            Ver eventos
        </a>
        @if(Auth::user()->role === 'organizer')
            <a href="{{ route('events.create') }}" class="btn btn-outline btn-primary btn-sm font-medium">
                Criar novo evento
            </a>
        @endif
    </div>

</div>

</x-app-layout>