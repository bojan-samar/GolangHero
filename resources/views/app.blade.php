<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

        @if(request()->routeIs('job.show'))
            <meta name="twitter:card" content="summary"/>
            <meta name="twitter:title" content="{{ $page['props']['job']['data']['title'] }}"/>
{{--            <meta name="twitter:description" content="{{ $page['props']['job']['data']['description'] }}"/>--}}
            <meta name="twitter:site" content="@golanghero"/>
            <meta name="twitter:image" content="{{ $page['props']['job']['data']['company']['photoUrl'] }}"/>
            <meta name="twitter:creator" content="@golanghero"/>
        @endif

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        @include('scripts')
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @inertia
    </body>
</html>
