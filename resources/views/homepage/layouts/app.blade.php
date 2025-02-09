<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BlogKU') }}</title>
</head>

<body>
    <header>
        @include('homepage.layouts.header')
    </header>

    <main class="flex w-full text-primary mt-4 lg:mt-5 p-4">
        @yield('content')
    </main>
</body>

</html>
