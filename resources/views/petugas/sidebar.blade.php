{{-- sidebar-petugas.blade.php --}}
<aside class="w-24 bg-blue-900 text-white flex flex-col items-center py-4">
    <img src="{{ asset ('assets/img/logo-rsi-banjarmasin.png') }}" alt="Logo Rumah Sakit"
        class="w-16 h-16 rounded-full shadow-lg mb-8">
    <nav class="space-y-4">

        {{-- Dashboard --}}
        <a href="{{ route('petugas.dashboard') }}"
           class="flex flex-col items-center text-sm p-2 rounded-lg transition-colors duration-200
                  {{ request()->routeIs('petugas.dashboard') ? 'bg-blue-800 text-white shadow-md' : 'text-gray-200 hover:bg-blue-800 hover:text-white' }}">
            <div class="p-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l7-7 7 7M19 10v10a1 1 0 01-1 1h-3m-11 0a1 1 0 01-1 1h-3m8-14v-2m-3 2V6M6 18h.01M6 6h.01"></path>
                </svg>
            </div>
            Dashboard
        </a>

        {{-- Antrean --}}
        <a href="{{ route('petugas.antrian') }}"
           class="flex flex-col items-center text-sm p-2 rounded-lg transition-colors duration-200
                  {{ request()->routeIs('petugas.antrian') || request()->routeIs('petugas.antrianDetail') ? 'bg-blue-800 text-white shadow-md' : 'text-gray-200 hover:bg-blue-800 hover:text-white' }}">
            <div class="p-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952
                                4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07
                                M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766
                                l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0
                                3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0
                                2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            Antrean
        </a>

        {{-- Stok Obat --}}
        <a href="{{ route('petugas.stokObat') }}"
           class="flex flex-col items-center text-sm p-2 rounded-lg transition-colors duration-200
                  {{ request()->routeIs('petugas.stokObat') ? 'bg-blue-800 text-white shadow-md' : 'text-gray-200 hover:bg-blue-800 hover:text-white' }}">
            <div class="p-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                </svg>
            </div>
            Stok Obat
        </a>

        {{-- Riwayat --}}
        <a href="{{ route('petugas.riwayatAntrian') }}"
           class="flex flex-col items-center text-sm p-2 rounded-lg transition-colors duration-200
                  {{ request()->routeIs('petugas.riwayatAntrian') ? 'bg-blue-800 text-white shadow-md' : 'text-gray-200 hover:bg-blue-800 hover:text-white' }}">
            <div class="p-2 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                </svg>
            </div>
            Riwayat
        </a>
    </nav>
</aside>
