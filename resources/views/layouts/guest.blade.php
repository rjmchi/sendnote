<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @wireUiScripts

    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="m-3">
        @if(Route::has('login'))
            <livewire:welcome.navigation />
        @endif
        </div>

        <div class="flex flex-col items-center justify-center p-6 mx-auto space-y-4 text-center">
            <a href="/" wire:navigate>
                <x-application-logo class="w-24 h-24 text-gray-500 fill-current" />
            </a>
            <div class="w-5/6">
                {{ $slot }}
            </div>

        </div>


    </body>
</html>
