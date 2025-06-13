<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Petugas Apotek')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        @include('petugas.sidebar')

        <main class="flex-1 p-6 bg-white rounded shadow-md">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
