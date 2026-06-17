@extends('layouts.app')

@section('content')

<div class="hero min-h-[70vh] bg-base-200">
    <div class="hero-content text-center">
        <div class="max-w-2xl">
            <h1 class="text-5xl font-bold text-primary">
                Passaporte
            </h1>

            <p class="py-6 text-lg">
                Plataforma para organização e participação
                em eventos acadêmicos, culturais e sociais.
            </p>

            <a
                href="{{ route('events.index') }}"
                class="btn btn-primary"
            >
                Explorar Eventos
            </a>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">

    <h2 class="text-3xl font-bold mb-8">
        Eventos em Destaque
    </h2>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

        @forelse($events as $event)

            <div class="card bg-base-100 shadow-lg">

                <figure>
                    <img
                        src="{{ asset('storage/'.$event->banner_path) }}"
                        alt="{{ $event->title }}"
                        class="h-52 w-full object-cover"
                    >
                </figure>

                <div class="card-body">

                    <h2 class="card-title">
                        {{ $event->title }}
                    </h2>

                    <p>
                        {{ Str::limit($event->description, 100) }}
                    </p>

                    <div class="text-sm opacity-70">
                        {{ $event->location }}
                    </div>

                    <div class="card-actions justify-end">

                        <a
                            href="{{ route('events.show', $event) }}"
                            class="btn btn-primary btn-sm"
                        >
                            Ver detalhes
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <p>Nenhum evento disponível.</p>

        @endforelse

    </div>

</div>

@endsection