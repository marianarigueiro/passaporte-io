<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @if(session('success'))
            <div class="alert alert-success mb-8 text-sm"><svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error mb-8 text-sm"><svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>{{ session('error') }}</div>
        @endif

        <div class="card lg:card-side bg-base-100 shadow-2xl border border-base-200 overflow-hidden">
            @if($event->banner_path)
                <figure class="lg:w-2/5">
                    <img src="{{ asset('storage/' . $event->banner_path) }}" alt="{{ $event->title }}" class="w-full h-72 lg:h-full object-cover">
                </figure>
            @else
                <div class="lg:w-2/5 h-72 lg:h-auto bg-base-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                </div>
            @endif

            <div class="card-body p-6 lg:p-8 gap-6">
                <div>
                    @if($event->category)
                        <span class="badge badge-primary badge-outline text-xs font-semibold mb-3">{{ $event->category->name }}</span>
                    @endif
                    <h1 class="text-3xl font-bold text-base-content">{{ $event->title }}</h1>
                </div>

                <!-- Metadados -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-base-content/40">Data e hora</p>
                            <p class="text-sm font-medium mt-0.5">{{ \Carbon\Carbon::parse($event->date_time)->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-base-content/40">Local</p>
                            <p class="text-sm font-medium mt-0.5">{{ $event->location }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-base-content/40">Organizador</p>
                            <p class="text-sm font-medium mt-0.5">{{ $event->organizer->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-base-content/40">Vagas</p>
                            @php $inscritos = $event->participants->count(); $restam = $event->capacity - $inscritos; @endphp
                            <p class="text-sm font-medium mt-0.5 {{ $restam <= 0 ? 'text-error' : 'text-base-content' }}">
                                {{ $restam <= 0 ? 'Esgotado' : $restam . ' de ' . $event->capacity . ' disponíveis' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Descrição -->
                <div class="border-t border-base-200 pt-6">
                    <h2 class="text-lg font-semibold mb-3">Sobre o evento</h2>
                    <p class="text-base-content/70 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                </div>

                <!-- Ações -->
                <div class="border-t border-base-200 pt-6 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('events.index') }}" class="btn btn-ghost btn-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        Voltar
                    </a>

                    <div class="flex flex-wrap gap-2">
                        @auth
                            @if(Auth::user()->role === 'participant')
                                @php $inscrito = $event->participants->contains(Auth::id()); @endphp
                                @if($inscrito)
                                    <form method="POST" action="{{ route('events.unsubscribe', $event) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline btn-error btn-sm" onclick="return confirm('Cancelar sua inscrição?')">
                                            Cancelar inscrição
                                        </button>
                                    </form>
                                @elseif($restam <= 0)
                                    <button class="btn btn-disabled btn-sm" disabled>Vagas esgotadas</button>
                                @else
                                    <form method="POST" action="{{ route('events.subscribe', $event) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm shadow-md">
                                            Inscrever-se
                                        </button>
                                    </form>
                                @endif
                            @endif

                            @if(Auth::user()->role === 'organizer' && Auth::id() === $event->user_id)
                                <a href="{{ route('events.edit', $event) }}" class="btn btn-ghost btn-sm">Editar</a>
                                <form method="POST" action="{{ route('events.destroy', $event) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline btn-error btn-sm" onclick="return confirm('Excluir este evento?')">Excluir</button>
                                </form>
                            @endif
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm shadow-md">Entre para se inscrever</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>