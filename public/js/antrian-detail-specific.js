// Script khusus untuk halaman antrianDetail.blade.php
const profileBtn = document.getElementById("profileBtn");
const profilePopup = document.getElementById("profilePopup");

if (profileBtn && profilePopup) {
    // Selalu pastikan elemen ada sebelum menambahkan event listener
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
