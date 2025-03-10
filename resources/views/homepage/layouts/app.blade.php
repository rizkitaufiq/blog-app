<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title>{{ config('app.name', 'BlogKU') }}</title>
</head>

<body>
    <header>
        @include('homepage.layouts.header')
    </header>

    <div class="flex w-full text-primary mt-4 lg:mt-5 p-4">
        @yield('content')
    </div>

    <footer class="footer footer-center bg-neutral text-neutral-content rounded p-10 w-full">
        @include('homepage.layouts.footer')
    </footer>

    <script>
        window.sessionSuccess = @json(session('success'));
        window.sessionError = @json(session('error'));
    </script>

    <script>
        function toggleComment(postId) {
            var commentSection = document.getElementById("comment-section-" + postId);

            if (commentSection.classList.contains("hidden")) {
                commentSection.classList.remove("hidden");
            } else {
                commentSection.classList.add("hidden");
            }
        }
    </script>

    <script>
        function toggleReplay(postId) {
            var commentSection = document.getElementById("comment-section-" + postId);

            if (commentSection.classList.contains("hidden")) {
                commentSection.classList.remove("hidden");
            } else {
                commentSection.classList.add("hidden");
            }
        }
    </script>

    @vite(['resources/js/app.js'])

</body>

</html>
