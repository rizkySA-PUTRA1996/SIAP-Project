<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Petugas Apotek')</title>
    {{-- Tailwind CSS dari CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    {{-- Jika ada CSS kustom (misal: style.css) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles') {{-- Untuk CSS spesifik halaman yang mungkin ditambahkan nanti --}}
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        @include('petugas.sidebar')

        <main class="flex-1 p-6 bg-white rounded shadow-md">
            @yield('content') {{-- Konten utama halaman akan masuk di sini --}}
        </main>
    </div>
    @stack('scripts') {{-- Untuk JS spesifik halaman --}}
</body>
</html>
