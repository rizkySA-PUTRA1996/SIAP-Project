<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apoteker - Riwayat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="font-sans bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('petugas.sidebar')
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white rounded shadow-md">
            <!-- Header -->
            <div class="relative flex items-center justify-between px-4 mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Riwayat E-Resep</h1>
                <div class="flex items-center space-x-4 text-sm text-gray-700">
                    <span>03 April 2025</span>
                    <!-- icon notifikasi -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-blue-900">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    <!-- icon user -->
                    <button id="profileBtn" class="flex items-center space-x-2 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-900">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                    <!-- Pop-up -->
                    <div id="profilePopup"
                        class="absolute z-50 hidden w-64 p-4 bg-white border shadow-lg top-10 right-4 rounded-xl">
                        <div class="flex items-center mb-3 space-x-3">
                            <img src="assets/img/download (3).jpg" alt="Profile"
                                class="object-cover w-12 h-12 rounded-full" />
                            <div>
                                <p class="text-base font-semibold text-gray-800">Violet Evergarden</p>
                                <p class="text-xs text-gray-500">Petugas Apotek</p>
                            </div>
                        </div>
                        <hr class="mb-3" />
                        <button
                            class="flex items-center mb-3 space-x-2 text-sm text-gray-800 hover:underline w-full px-2 py-2 rounded transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Profil Saya</span>
                        </button>
                        <button
                            class="w-full py-2 text-sm text-white bg-blue-900 rounded-md hover:bg-blue-800">Keluar</button>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <form METHOD="GET" action="{{ route('petugas.riwayatAntrian') }}" class="flex justify-end mb-2">
                <div class="mb-4 flex justify-end">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Pasien..."
                        class="px-3 py-1 text-sm border border-gray-300 rounded" />
            </form>
    </div>

    <!-- Table -->
    <div class="overflow-auto">
        <table class="min-w-full text-sm border-collapse border rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="border px-4 py-2">Kode E-Resep</th>
                    <th class="border px-4 py-2">Rekam Medis</th>
                    <th class="border px-4 py-2">Nama Pasien</th>
                    <th class="border px-4 py-2">Tanggal Diterima</th>
                    <th class="border px-4 py-2">Tanggal Selesai</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($riwayat as $id_resep => $items)
                    @php
                        $first = $items->first();
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $id_resep }}</td>
                        <td class="border px-4 py-2">{{ $first->antrian->rm }}</td>
                        <td class="border px-4 py-2">{{ $first->riwayat->nama_pasien }}</td>
                        <td class="border px-4 py-2">{{ $first->riwayat->tanggal_diterima }}</td>
                        <td class="border px-4 py-2">{{ $first->riwayat->tanggal_selesai }}</td>
                        <td class="px-4 py-2 text-green-600 border">{{ $first->riwayat->status }}</td>
                        <td class="border px-4 py-2 relative">
                            <button class="more-btn" onclick="toggleMenu(this)">⋮</button>
                            <div class="lihat-obat-menu absolute right-0 z-10 mt-2 w-40 bg-white border rounded shadow-lg hidden">
                                <button onclick="openModal('detailRiwayatModal{{ $id_resep }}')"
                                    class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-blue-900"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-3-3v6m9-6.75V19.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 19.5V6.75M21 6.75A2.25 2.25 0 0 0 18.75 4.5h-1.5a.75.75 0 0 1-.75-.75V3a.75.75 0 0 0-.75-.75h-6A.75.75 0 0 0 9 3v.75a.75.75 0 0 1-.75.75h-1.5A2.25 2.25 0 0 0 3 6.75" />
                                    </svg>
                                    Lihat Obat
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </main>
    </div>

    <!-- Modal Data Obat -->
    @foreach ($riwayat as $id_resep => $items)
        @php
            $first = $items->first();
        @endphp
        <div id="detailRiwayatModal{{ $id_resep }}"
            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl p-8">
                <h2 class="text-2xl font-semibold text-blue-900 mb-2">Data Obat</h2>
                <p class="text-base text-gray-700 mb-1">Kode E-Resep : <span
                        class="font-medium">{{ $id_resep }}</span></p>
                <p class="text-base text-gray-700 mb-4">Nama Pasien : <span
                        class="font-medium">{{ $first->riwayat->nama_pasien }}</span></p>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-collapse rounded-lg">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="px-4 py-2 border">Kode</th>
                                <th class="px-4 py-2 border">Nama Obat</th>
                                <th class="px-4 py-2 border">Kategori</th>
                                <th class="px-4 py-2 border">Bentuk Satuan</th>
                                <th class="px-4 py-2 border">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            @foreach ($items as $detail)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $detail->obat->kode_obat }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->obat->nama_obat }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->obat->kategori_obat }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->obat->bentuk_satuan }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-6">
                    <button onclick="closeModal('detailRiwayatModal{{ $id_resep }}')"
                        class="px-6 py-2 rounded bg-blue-900 text-white hover:bg-blue-800">Tutup</button>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Profile popup logic
        const profileBtn = document.getElementById('profileBtn');
        const profilePopup = document.getElementById('profilePopup');

        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profilePopup.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!profilePopup.contains(e.target) && e.target !== profileBtn) {
                profilePopup.classList.add('hidden');
            }
        });

        // Toggle menu function (lihat obat)
        function toggleMenu(btn) {
            document.querySelectorAll('.lihat-obat-menu').forEach(menu => menu.classList.add('hidden'));
            const menu = btn.nextElementSibling;
            menu.classList.toggle('hidden');
            document.addEventListener('click', function handler(e) {
                if (!menu.contains(e.target) && e.target !== btn) {
                    menu.classList.add('hidden');
                    document.removeEventListener('click', handler);
                }
            });
        }

        // Modal logic
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        // Event untuk tombol "Lihat Obat"
        document.querySelectorAll('.lihat-obat-menu button').forEach(btn => {
            btn.addEventListener('click', function() {
                openModal('dataObatModal');
                btn.parentElement.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
