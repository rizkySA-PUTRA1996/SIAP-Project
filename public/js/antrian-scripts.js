// Profile popup logic
const profileBtn = document.getElementById("profileBtn");
const profilePopup = document.getElementById("profilePopup");

if (profileBtn && profilePopup) {
    // Pengecekan elemen ada
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

// Search logic for table
const searchInput = document.getElementById("searchInput");
const tableRows = document.querySelectorAll("tbody tr");

if (searchInput && tableRows) {
    // Pengecekan elemen ada
    searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach((row) => {
            // Pastikan kolom yang diakses sesuai dengan struktur tabel
            // 0: No, 1: Rekam Medis, 2: No. Resep, 3: No. Registrasi, 4: Nama Poli, 5: Antrean, 6: Status
            const rekamMedis = row.cells[1]
                ? row.cells[1].textContent.toLowerCase()
                : "";
            const noResep = row.cells[2]
                ? row.cells[2].textContent.toLowerCase()
                : "";
            const noRegistrasi = row.cells[3]
                ? row.cells[3].textContent.toLowerCase()
                : ""; // Mengganti idPoli menjadi No. Registrasi
            const antrean = row.cells[5]
                ? row.cells[5].textContent.toLowerCase()
                : ""; // Antrean ada di indeks 5

            if (
                rekamMedis.includes(searchTerm) ||
                noResep.includes(searchTerm) ||
                noRegistrasi.includes(searchTerm) ||
                antrean.includes(searchTerm)
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
}
