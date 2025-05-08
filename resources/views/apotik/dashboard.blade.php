<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Awal - Apotik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg p-10 max-w-xl text-center">
        <img src="{{ asset('assets/media/app/logo-rsi-banjarmasin.png') }}" alt="Logo Apotik" class="h-20 mx-auto mb-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang di Aplikasi Apotik</h1>
        <p class="text-gray-600 mb-6">Silakan login untuk melanjutkan ke dashboard admin atau petugas.</p>

        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            Masuk
        </a>
    </div>

</body>
</html>
