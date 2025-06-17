@extends('layouts.petugas')

@section('title', 'Detail Antrean')

@section('content')
    {{-- Header Halaman --}}
    <div class="flex justify-between items-center mb-6 relative">
        {{-- Judul Halaman Sesuai Gambar --}}
        <h2 class="text-2xl font-semibold text-blue-900">Detail E-Resep</h2>
        <div class="text-sm text-gray-700 flex items-center space-x-4">
            <span class="text-gray-700 text-sm">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-blue-900">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>

            <button id="profileBtn" class="flex items-center space-x-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-blue-900">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
            {{-- Pop-up profil, posisikan relatif terhadap div induk --}}
            <div id="profilePopup"
                class="hidden absolute top-10 right-0 w-64 bg-white rounded-xl shadow-lg border p-4 z-50">
                <div class="flex items-center space-x-3 mb-3">
                    <img src="{{ asset('assets/img/download (3).jpg') }}" alt="Profile"
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
        <div class="bg-white rounded-xl border border-gray-300 px-6 py-4 text-center shadow-md">
            <p class="text-base text-gray-500">Antrian</p>
            <p class="text-5xl font-bold text-blue-900 mt-1">{{ $detail['antrian']['no_antrian'] ?? '-'}}</p>
        </div>

        {{-- Info Resep --}}
        <div class="space-y-1 text-sm text-gray-700">
            <p><strong>Kode E-Resep :</strong> {{ $detail['antrean']['id_resep'] ?? '-' }}</p>
            <p><strong>Nama Pasien :</strong> {{-- $detail['nama_pasien'] ?? '-'  --}}</p>
            <p><strong>Waktu E-Resep diterima :</strong> {{-- $detail['tanggal_diterima'] ?? '-' --}}</p>
            <p>
                <strong>Status :</strong>
                <span
                    class="font-semibold {{ ($detail['antrian']['status'] ?? '') === 'Sudah Bayar' ? 'text-green-600' : 'text-blue-600' }}">
                    {{ $detail['antrian']['status'] ?? '-' }}
                </span>
            </p>
        </div>
    </div>

    {{-- Tabel Obat --}}
    <div class="mt-8 overflow-x-auto border rounded-lg shadow-sm">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-left font-medium">Kode</th>
                    <th class="py-2 px-4 text-left font-medium">Nama Obat</th>
                    <th class="py-2 px-4 text-left font-medium">Kategori</th>
                    <th class="py-2 px-4 text-left font-medium">Bentuk Satuan</th>
                    <th class="py-2 px-4 text-left font-medium">Jumlah</th>
                    <th class="py-2 px-4 text-left font-medium">Pemakaian</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-gray-800">
                @foreach ($detail['resepDetails'] as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['obat']['id_obat'] ?? '-' }}</td>
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['obat']['nama_obat'] ?? '-' }}</td>
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['kategori']['nama_kategori'] ?? '-' }}</td>
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['obat']['bentuk_satuan'] ?? '-' }}</td>
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['jumlah'] ?? '-' }}</td>
                        <td class="py-2 px-4 whitespace-nowrap">{{ $item['aturan_pakai'] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Tombol --}}
    <div class="flex justify-end gap-4 mt-6">
        <a href="{{ route('petugas.antrian') }}"
            class="bg-blue-900 hover:bg-blue-800 text-white px-5 py-2.5 rounded-md text-base font-semibold transition-colors duration-200">Konfirmasi</a>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/antrian-detail-specific.js') }}"></script>
@endpush
