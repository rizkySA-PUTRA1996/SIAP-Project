// Dropdown logic
const dropdownButton1 = document.getElementById('dropdownButton1');
const dropdownMenu1 = document.getElementById('dropdownMenu1');

if (dropdownButton1 && dropdownMenu1) { // Tambahkan pengecekan null untuk elemen
    dropdownButton1.addEventListener('click', (event) => {
        event.stopPropagation();
        dropdownMenu1.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!dropdownMenu1.contains(e.target) && e.target !== dropdownButton1) {
            dropdownMenu1.classList.add('hidden');
        }
    });
}


// Modal logic
const openModal = (modalId) => {
    document.getElementById(modalId).classList.remove('hidden');
};

const closeModal = (modalId) => {
    document.getElementById(modalId).classList.add('hidden');
};

// Pastikan elemen ada sebelum menambahkan event listener
const ubahStokBtn = document.getElementById('ubahStokBtn');
const ubahHargaBtn = document.getElementById('ubahHargaBtn');
const ubahKedaluwarsaBtn = document.getElementById('ubahKedaluwarsaBtn');
const hapusObatBtn = document.getElementById('hapusObatBtn');

if (ubahStokBtn) ubahStokBtn.addEventListener('click', () => openModal('ubahStokModal'));
if (ubahHargaBtn) ubahHargaBtn.addEventListener('click', () => openModal('ubahHargaModal'));
if (ubahKedaluwarsaBtn) ubahKedaluwarsaBtn.addEventListener('click', () => openModal('ubahKedaluwarsaModal'));
if (hapusObatBtn) hapusObatBtn.addEventListener('click', () => openModal('hapusObatModal'));


// Profile popup logic
const profileBtn = document.getElementById('profileBtn');
const profilePopup = document.getElementById('profilePopup');

if (profileBtn && profilePopup) { // Tambahkan pengecekan null untuk elemen
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

// Search logic
const searchInput = document.getElementById("searchInput");
const tableRows = document.querySelectorAll("tbody tr");

if (searchInput && tableRows) { // Tambahkan pengecekan null untuk elemen
    searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach((row) => {
            // Mengambil teks dari kolom kedua (indeks 1) karena kolom pertama adalah 'Kode'
            const namaObat = row.querySelectorAll("td")[1].textContent.toLowerCase();

            if (searchTerm.length >= 3 && namaObat.includes(searchTerm)) {
                row.style.display = "";
            } else if (searchTerm.length < 3) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
}
