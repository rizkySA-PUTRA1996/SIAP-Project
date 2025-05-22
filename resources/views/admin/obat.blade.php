<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apoteker - Stok Obat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="font-sans bg-gray-100">
    <div class="flex min-h-screen">
        @include('admin.sidebar')
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white rounded shadow-md">
            <!-- Header -->
            <div class="relative flex items-center justify-between px-4 mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Inventaris Obat</h1>
                <div class="flex items-center space-x-4 text-sm text-gray-700">
                    <span>03 April 2025</span>
                    <!-- icon notifikasi -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"class="w-6 h-6 text-blue-900">
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
                                <p class="text-base font-semibold text-gray-800">Mr. Roc</p>
                                <p class="text-xs text-gray-500">Admin Apotek</p>
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
            <div class="flex justify-end mb-4 space-x-2">
                <!-- Input pencarian obat -->
                <input type="text" id="searchInput" placeholder="Cari Obat..."
                    class="w-1/4 px-3 py-1 text-sm border border-gray-300 rounded" />

                <!-- Dropdown filter -->
                <select class="w-1/4 px-3 py-1 text-sm border border-gray-300 rounded">
                    <option>Stok (Terbanyak)</option>
                    <option>Stok (Tersedikit)</option>
                    <option>Kadaluwarsa</option>
                </select>

                <!-- Tombol tambah obat -->
                <button class="w-1/4 px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-100 text-gray-800"
                    onclick="openModal('tambahObatModal')">
                    + Tambahkan Obat
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-auto">
                <table class="min-w-full overflow-hidden text-sm border border-collapse rounded-lg">
                    <thead class="text-white bg-blue-900">
                        <tr>
                            <th class="px-4 py-2 border">Kode</th>
                            <th class="px-4 py-2 border">Nama Obat</th>
                            <th class="px-4 py-2 border">Kategori</th>
                            <th class="px-4 py-2 border">Bentuk Satuan</th>
                            <th class="px-4 py-2 border">Stok</th>
                            <th class="px-4 py-2 border">Harga Jual</th>
                            <th class="px-4 py-2 border">Kedaluwarsa</th>
                            <th class="px-4 py-2 border"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $o)
                            <tr id="row1">
                                <td class="px-4 py-2 border">{{ $o->id_obat }}</td>
                                <td class="px-4 py-2 border">{{ $o->nama_obat }}</td>
                                <td class="px-4 py-2 border">{{ $o->kategori->nama_kategori }}</td>
                                <td class="px-4 py-2 border">{{ $o->bentuk_satuan }}</td>
                                <td id="stok1" class="px-4 py-2 border">{{ $o->stok }}</td>
                                <td id="harga1" class="px-4 py-2 border">Rp. {{ $o->harga }}</td>
                                <td id="kedaluwarsa1" class="px-4 py-2 border">{{ $o->kadaluarsa }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <button id="dropdownButton1"
                                        class="text-lg text-blue-600 hover:underline focus:outline-none">⋮</button>
                                    <div id="dropdownMenu1"
                                        class="absolute right-0 z-10 hidden w-48 mt-2 bg-white border rounded-md shadow-lg">
                                        <ul class="text-sm text-gray-700">
                                            <li>
                                                <button id="ubahStokBtn"
                                                    class="flex items-center w-full px-4 py-2 hover:bg-gray-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-2 text-blue-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                                    </svg>
                                                    Ubah Stok
                                                </button>
                                            </li>
                                            <li>
                                                <button id="ubahHargaBtn"
                                                    class="flex items-center w-full px-4 py-2 hover:bg-gray-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-2 text-blue-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 6h.008v.008H6V6Z" />
                                                    </svg>
                                                    Ubah Harga
                                                </button>
                                            </li>
                                            <li>
                                                <button id="ubahKedaluwarsaBtn"
                                                    class="flex items-center w-full px-4 py-2 hover:bg-gray-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-2 text-blue-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                    </svg>
                                                    Ubah Kedaluwarsa
                                                </button>
                                            </li>
                                            <li>
                                                <button id="hapusObatBtn"
                                                    class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-red-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                    Hapus Obat
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <script>
                        // Dropdown logic
                        const dropdownButton1 = document.getElementById('dropdownButton1');
                        const dropdownMenu1 = document.getElementById('dropdownMenu1');

                        dropdownButton1.addEventListener('click', (event) => {
                            event.stopPropagation();
                            dropdownMenu1.classList.toggle('hidden');
                        });

                        document.addEventListener('click', () => {
                            dropdownMenu1.classList.add('hidden');
                        });

                        // Modal logic
                        const openModal = (modalId) => {
                            document.getElementById(modalId).classList.remove('hidden');
                        };

                        const closeModal = (modalId) => {
                            document.getElementById(modalId).classList.add('hidden');
                        };

                        document.getElementById('ubahStokBtn').addEventListener('click', () => openModal('ubahStokModal'));
                        document.getElementById('ubahHargaBtn').addEventListener('click', () => openModal('ubahHargaModal'));
                        document.getElementById('ubahKedaluwarsaBtn').addEventListener('click', () => openModal('ubahKedaluwarsaModal'));
                        document.getElementById('hapusObatBtn').addEventListener('click', () => openModal('hapusObatModal'));

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
                    </script>

                    <!-- Dialog Modals -->
                    <div id="ubahStokModal"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-md shadow-lg">
                            <h2 class="text-lg font-semibold mb-4">Ubah Stok Obat</h2>
                            <label class="block mb-2">Stok Sebelumnya:</label>
                            <input type="text"
                                class="w-full px-4 py-2 mb-4 border rounded-md bg-gray-100 cursor-not-allowed"
                                value="50" readonly />
                            <label class="block mb-2">Stok Terbaru:</label>
                            <input type="text" class="w-full px-4 py-2 mb-4 border rounded-md" />
                            <div class="flex justify-end space-x-2">
                                <button class="px-4 py-2 border rounded-md"
                                    onclick="closeModal('ubahStokModal')">Batal</button>
                                <button class="px-4 py-2 text-white bg-blue-600 rounded-md">Perbarui</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ubah Harga -->
                    <div id="ubahHargaModal"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-md shadow-lg">
                            <h2 class="text-lg font-semibold mb-4">Ubah Harga Obat</h2>
                            <label class="block mb-2">Harga Sebelumnya:</label>
                            <input type="text"
                                class="w-full px-4 py-2 mb-4 border rounded-md bg-gray-100 cursor-not-allowed"
                                value="5000" readonly />
                            <label class="block mb-2">Harga Terbaru:</label>
                            <input type="text" class="w-full px-4 py-2 mb-4 border rounded-md" />
                            <div class="flex justify-end space-x-2">
                                <button class="px-4 py-2 border rounded-md"
                                    onclick="closeModal('ubahHargaModal')">Batal</button>
                                <button class="px-4 py-2 text-white bg-blue-600 rounded-md">Perbarui</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ubah Kedaluwarsa -->
                    <div id="ubahKedaluwarsaModal"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-md shadow-lg">
                            <h2 class="text-lg font-semibold mb-4">Ubah Kedaluwarsa Obat</h2>
                            <label class="block mb-2">Tanggal Sebelumnya:</label>
                            <input type="date"
                                class="w-full px-4 py-2 mb-4 border rounded-md bg-gray-100 cursor-not-allowed"
                                value="2027-08-15" readonly />
                            <label class="block mb-2">Tanggal Terbaru:</label>
                            <input type="date" class="w-full px-4 py-2 mb-4 border rounded-md" />
                            <div class="flex justify-end space-x-2">
                                <button class="px-4 py-2 border rounded-md"
                                    onclick="closeModal('ubahKedaluwarsaModal')">Batal</button>
                                <button class="px-4 py-2 text-white bg-blue-600 rounded-md">Perbarui</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus Obat -->
                    <div id="hapusObatModal"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-md shadow-lg">
                            <h2 class="text-lg font-semibold mb-4">Hapus Obat?</h2>
                            <div class="flex justify-end space-x-2">
                                <button class="px-4 py-2 border rounded-md"
                                    onclick="closeModal('hapusObatModal')">Batal</button>
                                <button class="px-4 py-2 text-white bg-red-600 rounded-md">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambahkan Obat -->
                    <div id="tambahObatModal"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div class="bg-white p-6 rounded-md shadow-lg w-96 relative">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Tambahkan Obat</h2>
                                <button onclick="closeModal('tambahObatModal')"
                                    class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
                            </div>

                            <form action="{{ route('admin.stokObat.store') }}" method="POST">
                                @csrf

                                <div class="mb-2">
                                    <label class="block text-sm mb-1">Nama Obat:</label>
                                    <input type="text" name="nama_obat" class="w-full px-2 py-1 border rounded"
                                        required />
                                </div>

                                <div class="flex gap-2 mb-2">
                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Kode Obat:</label>
                                        <input type="text" name="kode_obat"
                                            class="w-full px-2 py-1 border rounded" required />
                                    </div>

                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Kategori Obat:</label>
                                        <select name="id_kategori" class="w-full px-2 py-1 border rounded" required>
                                            <option disabled selected>Pilih Kategori</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="flex gap-2 mb-2">
                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Bentuk Satuan:</label>
                                        <select name="bentuk_satuan" class="w-full px-2 py-1 border rounded" required>
                                            <option disabled selected>Pilih Bentuk Satuan</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Kapsul">Kapsul</option>
                                            <option value="Sirup">Sirup</option>
                                            <option value="Suspensi">Suspensi</option>
                                            <option value="Salep">Salep</option>
                                            <option value="Krim">Krim</option>
                                            <option value="Suppositoria">Suppositoria</option>
                                            <option value="Injeksi">Injeksi</option>
                                            <option value="Drops (tetes)">Drops (tetes)</option>
                                            <option value="Inhaler">Inhaler</option>
                                        </select>
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Stok Obat:</label>
                                        <input name="stok" type="number" class="w-full px-2 py-1 border rounded"
                                            required />
                                    </div>
                                </div>

                                <div class="flex gap-2 mb-4">
                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Harga Jual Obat:</label>
                                        <input name="harga" type="text" class="w-full px-2 py-1 border rounded"
                                            required />
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-sm mb-1">Tanggal kedaluwarsa:</label>
                                        <input name="kadaluarsa" type="date"
                                            class="w-full px-2 py-1 border rounded" required />
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 text-white bg-blue-900 rounded">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                </table>
                <div class="mt-6">
                    {{ $obat->links() }}
                </div>
            </div>
            <script src="{{ asset('resources/search-admin-obat.js') }}"></script>
        </main>
    </div>
    <script>
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase();

    tableRows.forEach((row) => {
        const namaObat = row.querySelector(".col-nama")
            ? row.querySelector(".col-nama").textContent.toLowerCase()
            : row.querySelectorAll("td")[1].textContent.toLowerCase();

        if (searchTerm.length >= 3 && namaObat.includes(searchTerm)) {
            row.style.display = "";
        } else if (searchTerm.length < 3) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});

    </script>

</body>

</html>
