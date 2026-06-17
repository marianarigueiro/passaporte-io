<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Passaporte.io') }}</title>

    {{-- Fonte --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- DaisyUI (componentes) --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4/dist/full.min.css" rel="stylesheet" />

    {{-- Tailwind (utilitários) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Vite (apenas JS / Alpine) --}}
    @vite(['resources/js/app.js'])

    {{-- Paleta roxa/azul sobre o tema light --}}
    <style>
        body { font-family: 'Figtree', sans-serif; }

        [data-theme="light"] {
            --p: oklch(0.60 0.22 287);
            --pc: oklch(1 0 0);
            --s: oklch(0.62 0.19 245);
            --sc: oklch(1 0 0);
            --a: oklch(0.62 0.19 245);
            --ac: oklch(1 0 0);
            --b1: oklch(0.99 0.005 287);
            --b2: oklch(0.97 0.008 287);
            --b3: oklch(0.93 0.015 287);
            --bc: oklch(0.22 0.05 287);
            --er: oklch(0.55 0.22 27);
            --erc: oklch(1 0 0);
            --su: oklch(0.65 0.18 160);
            --suc: oklch(1 0 0);
            --wa: oklch(0.75 0.17 70);
            --wac: oklch(0.25 0.05 70);
            --in: oklch(0.62 0.19 245);
            --inc: oklch(1 0 0);
        }
    </style>
</head>
<body class="antialiased min-h-screen" style="background: linear-gradient(135deg, #4F46E5 0%, #6C63FF 50%, #3B82F6 100%);">
    {{ $slot }}
</body>
</html>