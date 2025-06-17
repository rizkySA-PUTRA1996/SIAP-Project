document.addEventListener("DOMContentLoaded", () => {
    console.log("antrian-scripts.js: DOMContentLoaded event fired.");

    const profileBtn = document.getElementById("profileBtn");
    const profilePopup = document.getElementById("profilePopup");

    if (profileBtn && profilePopup) {
        console.log("antrian-scripts.js: Profile button and popup found.");
        profileBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            profilePopup.classList.toggle("hidden");
            console.log("Profile popup toggled.");
        });

        document.addEventListener("click", (event) => {
            if (
                !profilePopup.contains(event.target) &&
                event.target !== profileBtn
            ) {
                profilePopup.classList.add("hidden");
                console.log("Profile popup hidden on outside click.");
            }
        });
    } else {
        console.warn("antrian-scripts.js: Profile button or popup not found.");
    }

    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll("tbody tr");

    if (searchInput && tableRows.length > 0) {
        console.log(
            "antrian-scripts.js: Search input and table rows found. Attaching event listener."
        );
        searchInput.addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase();
            console.log("Search term:", searchTerm);

            tableRows.forEach((row) => {
                const rekamMedis = row.cells[1]
                    ? row.cells[1].textContent.toLowerCase()
                    : "";
                const idResep = row.cells[2]
                    ? row.cells[2].textContent.toLowerCase()
                    : "";
                const noRegistrasi = row.cells[3]
                    ? row.cells[3].textContent.toLowerCase()
                    : "";
                const antrean = row.cells[5]
                    ? row.cells[5].textContent.toLowerCase()
                    : "";
                const namaPoli = row.cells[4]
                    ? row.cells[4].textContent.toLowerCase()
                    : "";

                if (
                    rekamMedis.includes(searchTerm) ||
                    idResep.includes(searchTerm) ||
                    noRegistrasi.includes(searchTerm) ||
                    namaPoli.includes(searchTerm) ||
                    antrean.includes(searchTerm)
                ) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    } else {
        console.warn(
            "antrian-scripts.js: Search input or table rows not found, or table is empty for search logic."
        );
    }

    const dropdownButton1 = document.getElementById("dropdownButton1");
    const dropdownMenu1 = document.getElementById("dropdownMenu1");

    if (dropdownButton1 && dropdownMenu1) {
        console.log("antrian-scripts.js: Dropdown button and menu found.");
        dropdownButton1.addEventListener("click", (event) => {
            event.stopPropagation();
            dropdownMenu1.classList.toggle("hidden");
        });
        document.addEventListener("click", (e) => {
            if (
                !dropdownMenu1.contains(e.target) &&
                e.target !== dropdownButton1
            ) {
                dropdownMenu1.classList.add("hidden");
            }
        });
    }

    const openModal = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) modal.classList.remove("hidden");
    };

    const closeModal = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) modal.classList.add("hidden");
    };

    const ubahStokBtn = document.getElementById("ubahStokBtn");
    if (ubahStokBtn) {
        ubahStokBtn.addEventListener("click", () => openModal("ubahStokModal"));
    }
});
