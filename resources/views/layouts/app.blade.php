<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="night">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Passaporte.io') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
        [data-theme="night"] {
            --p: 0.65 0.22 287;
            --pf: 0.55 0.20 287;
            --s: 0.55 0.20 245;
            --sf: 0.45 0.18 245;
            --a: 0.55 0.20 245;
            --b1: 0.12 0.02 285;
            --b2: 0.17 0.03 285;
            --b3: 0.21 0.04 285;
            --bc: 0.88 0.02 285;
        }
        .gradient-hero {
            background: linear-gradient(135deg, #2e0262 0%, #3b0764 30%, #1e1b4b 100%);
        }
        .card-event:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px -6px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body class="antialiased bg-base-300 min-h-screen flex flex-col">

    @include('layouts.navigation')  {{-- Navbar sempre visível, inclusive para guest --}}

    {{-- Espaçamento para compensar a navbar fixa (altura ~4rem) --}}
    <div class="pt-16">
        @isset($header)
            <header class="bg-base-100/80 backdrop-blur-md border-b border-base-200">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

    {{-- Footer em todas as páginas --}}
    <footer class="border-t border-base-200 bg-base-100 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-sm text-base-content/60 text-center">
            &copy; {{ date('Y') }} Passaporte.io — Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>