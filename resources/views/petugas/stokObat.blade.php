@extends('layouts.petugas')

@section('title', 'Petugas - Stok Obat')

@section('content')
    <div class="flex justify-between items-center mb-6 relative px-4">
        <h1 class="text-2xl font-semibold text-gray-800">Stok Obat</h1>
        <div class="text-sm text-gray-700 flex items-center space-x-4">
            <span>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-6 h-6 text-blue-900">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            <button id="profileBtn" class="flex items-center space-x-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-900">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
            <div id="profilePopup" class="hidden absolute top-10 right-4 w-64 bg-white rounded-xl shadow-lg border p-4 z-50">
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

    <form method="GET" action="{{ route('petugas.stokObat') }}">
        <div class="flex justify-end mb-4">
            <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Cari Obat..."
               class="px-4 py-2 border rounded-md text-sm" />
        </div>
    </form>

    <div class="overflow-auto">
        <table class="min-w-full text-sm border-collapse border rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="border px-4 py-2">Kode</th>
                    <th class="border px-4 py-2">Nama Obat</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Bentuk Satuan</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Harga Jual</th>
                    <th class="border px-4 py-2">Kedaluwarsa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stokObat as $o)
                <tr>
                    <td class="border px-4 py-2">{{ $o->id_obat}}</td>
                    <td class="border px-4 py-2">{{ $o->nama_obat }}</td>
                    <td class="border px-4 py-2">{{ $o->kategori->nama_kategori }}</td>
                    <td class="border px-4 py-2">{{ $o->bentuk_satuan }}</td>
                    <td class="border px-4 py-2">{{ $o->stok }}</td>
                    <td class="border px-4 py-2">Rp. {{ $o->harga}}</td>
                    <td class="border px-4 py-2">{{ $o->kadaluarsa }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            {{ $stokObat->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/stok-obat-petugas-scripts.js') }}"></script>
@endpush
