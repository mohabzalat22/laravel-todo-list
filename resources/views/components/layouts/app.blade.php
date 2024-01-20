<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>todo list</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
