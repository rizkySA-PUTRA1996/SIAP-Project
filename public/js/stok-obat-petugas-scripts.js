// Script khusus untuk halaman stokObat.blade.php di area petugas

// Profile popup logic
const profileBtn = document.getElementById("profileBtn");
const profilePopup = document.getElementById("profilePopup");

if (profileBtn && profilePopup) {
    // Pastikan elemen ada
    profileBtn.addEventListener("click", (event) => {
        event.stopPropagation(); // Mencegah event click menyebar ke document
        profilePopup.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (
            !profileBtn.contains(event.target) &&
            !profilePopup.contains(event.target)
        ) {
            profilePopup.classList.add("hidden");
        }
    });
}

// Search logic
const searchInput = document.getElementById("searchInput");
const tableRows = document.querySelectorAll("tbody tr");

if (searchInput && tableRows.length > 0) {
    // Pastikan elemen ada dan ada baris tabel
    searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach((row) => {
            // Mengambil teks dari kolom kedua (indeks 1) karena kolom pertama adalah 'Kode'
            // Pastikan kolom ini selalu ada atau tambahkan pengecekan null
            const namaObatCell = row.querySelectorAll("td")[1];
            const namaObat = namaObatCell
                ? namaObatCell.textContent.toLowerCase()
                : "";

            // Tampilkan semua baris jika searchTerm kurang dari 3 karakter
            if (searchTerm.length < 3) {
                row.style.display = "";
            }
            // Jika searchTerm 3 karakter atau lebih, filter berdasarkan namaObat
            else if (namaObat.includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
}
