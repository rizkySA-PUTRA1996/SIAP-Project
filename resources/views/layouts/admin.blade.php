<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Apoteker Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body class="font-sans bg-gray-100">
    <div class="flex min-h-screen">
        @include('admin.sidebar')

        <main class="flex-1 p-6 bg-white rounded shadow-md">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/obat-scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
