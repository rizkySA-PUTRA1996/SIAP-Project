@extends('layouts.petugas') {{-- Menggunakan layout utama petugas --}}

@section('title', 'Petugas - Dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6 relative">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Petugas</h1>
        <div class="text-sm text-gray-700 flex items-center space-x-4">
            <span class="text-gray-700 text-sm">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-blue-900">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>

            <button id="profileBtn" class="flex items-center space-x-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-900">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
            <div id="profilePopup" class="hidden absolute top-10 right-0 w-64 bg-white rounded-xl shadow-lg border p-4 z-50">
                <div class="flex items-center space-x-3 mb-3">
                    <img src="{{ asset('assets/img/download (3).jpg') }}"
                        alt="Profile" class="w-12 h-12 rounded-full object-cover" />
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
                    <button type="submit" class="w-full bg-blue-900 text-white text-sm py-2 rounded-md hover:bg-blue-800">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        {{-- Card Statistik 1: Antrean Aktif --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform transition-transform hover:scale-105 duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Antrean Aktif</span>
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.11 0 2 .89 2 2v4a2 2 0 01-2 2m0-6V8m0 0a2 2 11-4 0 2 2 0 014 0zM12 22a9 9 0 110-18 9 9 0 010 18z"></path></svg>
            </div>
            <p class="text-4xl font-bold text-blue-900">5</p>
            <p class="text-sm text-gray-600 mt-2">Pasien menunggu</p>
        </div>

        {{-- Card Statistik 2: Obat Hampir Habis --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform transition-transform hover:scale-105 duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Obat Hampir Habis</span>
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-4xl font-bold text-yellow-700">20</p>
            <p class="text-sm text-gray-600 mt-2">Item dengan stok < 10</p>
        </div>

        {{-- Card Statistik 3: Resep Terproses Hari Ini --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform transition-transform hover:scale-105 duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-semibold text-gray-500">Resep Terproses Hari Ini</span>
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
            <p class="text-4xl font-bold text-green-700">32</p>
            <p class="text-sm text-gray-600 mt-2">Resep selesai</p>
        </div>
    </div>

    {{-- Bagian Daftar Cepat / Aktivitas Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Card Antrean Terbaru --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Antrean Terbaru</h3>
            <ul class="space-y-3">
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>No. Antrean: 110 - RM: 000012345</span>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Menunggu</span>
                </li>
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>No. Antrean: 109 - RM: 000012344</span>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">Sudah Bayar</span>
                </li>
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>No. Antrean: 108 - RM: 000012343</span>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Menunggu</span>
                </li>
            </ul>
        </div>

        {{-- Card Obat dengan Stok Rendah --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Obat Stok Rendah</h3>
            <ul class="space-y-3">
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>Obat A - Sirup</span>
                    <span class="font-medium text-red-700">Stok: 3</span>
                </li>
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>Obat B - Tablet</span>
                    <span class="font-medium text-red-700">Stok: 5</span>
                </li>
                <li class="flex items-center justify-between text-sm text-gray-700">
                    <span>Obat C - Krim</span>
                    <span class="font-medium text-red-700">Stok: 2</span>
                </li>
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Script untuk profile popup (jika belum di layout) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileBtn = document.getElementById('profileBtn');
            const profilePopup = document.getElementById('profilePopup');

            if (profileBtn && profilePopup) {
                profileBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    profilePopup.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!profilePopup.contains(e.target) && e.target !== profileBtn) {
                        profilePopup.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endpush
