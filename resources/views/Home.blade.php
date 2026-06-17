<x-app-layout>

<div class="min-h-screen bg-base-200">

    <!-- HERO -->
    <section class="bg-gradient-to-r from-violet-700 via-indigo-700 to-blue-700 text-white">

        <div class="max-w-7xl mx-auto px-6 py-24">

            <div class="max-w-3xl">

                <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                    Descubra eventos que combinam com você
                </h1>

                <p class="mt-6 text-lg opacity-90">
                    Explore, participe e crie eventos em um sistema simples, moderno e organizado.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a href="{{ route('events.index') }}" class="btn btn-primary">
                        Explorar eventos
                    </a>

                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline text-white border-white">
                            Criar conta
                        </a>
                    @endguest

                </div>

            </div>

        </div>

    </section>

    <!-- ESTATÍSTICAS VISUAIS -->
    <section class="max-w-7xl mx-auto px-6 -mt-10">

        <div class="grid md:grid-cols-3 gap-6">

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="text-sm opacity-70">Eventos disponíveis</h2>
                    <p class="text-3xl font-bold text-primary">
                        {{ \App\Models\Event::count() }}
                    </p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="text-sm opacity-70">Eventos futuros</h2>
                    <p class="text-3xl font-bold text-primary">
                        {{ \App\Models\Event::where('date_time', '>=', now())->count() }}
                    </p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="text-sm opacity-70">Organizadores ativos</h2>
                    <p class="text-3xl font-bold text-primary">
                        {{ \App\Models\Event::distinct('user_id')->count('user_id') }}
                    </p>
                </div>
            </div>

        </div>

    </section>

    <!-- LISTA -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex justify-between items-end mb-8">

            <div>
                <h2 class="text-3xl font-bold">Últimos eventos</h2>
                <p class="text-sm opacity-70 mt-1">
                    Atualizados recentemente na plataforma
                </p>
            </div>

            <a href="{{ route('events.index') }}" class="link link-primary">
                Ver todos
            </a>

        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse($events as $event)

                <div class="card bg-base-100 shadow hover:shadow-lg transition">

                    @if($event->banner_path)
                        <figure>
                            <img src="{{ asset('storage/'.$event->banner_path) }}"
                                 class="h-48 w-full object-cover">
                        </figure>
                    @endif

                    <div class="card-body">

                        <h2 class="card-title">
                            {{ $event->title }}
                        </h2>

                        <p class="text-sm opacity-80">
                            {{ Str::limit($event->description, 110) }}
                        </p>

                        <div class="flex justify-between text-xs opacity-60 mt-2">

                            <span>{{ $event->location }}</span>

                            <span>{{ optional($event->category)->name }}</span>

                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('events.show', $event) }}"
                               class="btn btn-primary btn-sm">
                                Ver detalhes
                            </a>
                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full">
                    <div class="alert alert-info">
                        Nenhum evento encontrado.
                    </div>
                </div>

            @endforelse

        </div>

    </section>

</div>

</x-app-layout>