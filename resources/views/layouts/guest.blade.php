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
            background-color: oklch(0.14 0.01 285);
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
        .card-auth {
            backdrop-filter: blur(10px);
            background: oklch(0.17 0.03 285 / 0.85);
        }
    </style>
</head>
<body class="antialiased min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-[#0f0c29] via-[#302b63] to-[#24243e]">
    {{ $slot }}
</body>
</html>