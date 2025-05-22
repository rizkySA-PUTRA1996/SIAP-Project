<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Antrean</title>
    <link href="style.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar (dipisah) -->
        @include('petugas.sidebar')
        <!-- Main Content -->
        <main class="flex-1 bg-white p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Antrean Pasien</h2>
                <div class="text-sm text-gray-700 flex items-center space-x-4">
                    <span>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>

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
                        class="hidden absolute top-10 right-4 w-64 bg-white rounded-xl shadow-lg border p-4 z-50">
                        <div class="flex items-center space-x-3 mb-3">
                            <img src="assets/img/download (3).jpg" alt="Profile"
                                class="w-12 h-12 rounded-full object-cover" />
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Mr. Roc</p>
                                <p class="text-xs text-gray-500">Petugas Apotek</p>
                            </div>
                        </div>
                        <hr class="mb-3" />
                        <button class="flex items-center space-x-2 text-sm text-blue-900 hover:underline mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Profil Saya</span>
                        </button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full bg-blue-900 text-white text-sm py-2 rounded-md hover:bg-blue-800">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex items-start gap-8">
                <!-- Box Antrian -->
                <div class="bg-white shadow-md border rounded-lg px-6 py-4 text-center">
                    <p class="text-sm text-gray-500">Antrian</p>
                    <p class="text-4xl font-bold text-blue-900">{{ $detail->antrian->no_antrian }}</p>
                </div>

                <!-- Info Resep -->
                <div class="space-y-1 text-sm text-gray-700">
                    <p><strong>Kode E-Resep :</strong> {{ $detail->antrian->id_resep ?? '-' }}</p>
                    <p><strong>Nama Pasien :</strong> {{ $detail->riwayat->nama_pasien ?? '-' }}</p>
                    <p><strong>Waktu E-Resep diterima :</strong> {{ $detail->riwayat->tanggal_diterima ?? '-' }}</p>
                    <p>
                        <strong>Status :</strong>
                        <span
                            class="font-semibold {{ $detail->antrian->status === 'Sudah Bayar' ? 'text-green-600' : 'text-blue-600' }}">
                            {{ $detail->antrian->status ?? '-' }}
                        </span>
                    </p>
                </div>
            </div>

            <!-- Tabel Obat -->
            <div class="mt-8">
                <table class="min-w-full text-sm border-collapse border rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-blue-900 text-white">
                            <th class="py-2 px-4 border">Kode</th>
                            <th class="py-2 px-4 border">Nama Obat</th>
                            <th class="py-2 px-4 border">Kategori</th>
                            <th class="py-2 px-4 border">Bentuk Satuan</th>
                            <th class="py-2 px-4 border">Jumlah</th>
                            <th class="py-2 px-4 border">Pemakaian</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-800">
                        @foreach ($resepDetails as $item)
                            <tr class="border">
                                <td class="py-2 px-4 border">{{ $item->obat->kode_obat ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $item->obat->nama_obat ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $item->obat->bentuk_satuan ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $item->jumlah ?? '-' }}</td>
                                <td class="py-2 px-4 border">{{ $item->aturan_pakai ?? '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Tombol -->
                <div class="flex justify-end gap-4 mt-6">
                    <a href="{{ route('petugas.antrian') }}"
                        class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md">Konfirmasi</a>
                </div>
            </main>
        </div>
        <script>
            const btn = document.getElementById('profileBtn');
            const popup = document.getElementById('profilePopup');

            btn.addEventListener('click', () => {
                popup.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!btn.contains(event.target) && !popup.contains(event.target)) {
                    popup.classList.add('hidden');
                }
            });
        </script>
    </body>

    </html>
