<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presto.it</title>
    @livewireStyles
    @vite(['resources\css\app.css', 'resources\js\app.js'])
<body class="body-custom">
    <x-navbar />
        @if (Route::currentRouteName() == 'page.homepage'){
            <x-header />
        }
        @endif
    <main class="controller main_custom">
        @if (Route::currentRouteName() != 'announcement.create' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
            <x-filters />
        @endif
        {{ $slot }}
    </main>
    <x-footer />
    @livewireScripts
</body>
</html>
