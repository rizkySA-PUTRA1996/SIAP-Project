document.addEventListener("DOMContentLoaded", () => {
    // Efek 3D pada Login Card (Mengikuti Kursor)
    const loginCard = document.getElementById("loginCard");

    if (loginCard) {
        loginCard.addEventListener("mousemove", (e) => {
            const rect = loginCard.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * 5;
            const rotateY = ((x - centerX) / centerX) * -5;

            loginCard.style.transform = `scale(1.02) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            loginCard.style.boxShadow = `0 ${25 + Math.abs(rotateX) * 0.5}px ${
                50 + Math.abs(rotateY) * 0.5
            }px -12px rgba(0, 0, 0, 0.4)`; // Penyesuaian bayangan
        });

        loginCard.addEventListener("mouseleave", () => {
            loginCard.style.transform = `scale(1) rotateX(0deg) rotateY(0deg)`;
            loginCard.style.boxShadow = `0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1)`;
        });
    }

        function updateToggleIcon() {
            if (passwordField.getAttribute("type") === "password") {
                togglePassword.innerHTML = eyeOpenIcon; // Tampilkan ikon mata terbuka jika input type 'password'
            } else {
                togglePassword.innerHTML = eyeClosedIcon; // Tampilkan ikon mata tertutup jika input type 'text'
            }
        }

        // Event listener saat ikon diklik
        togglePassword.addEventListener("click", function () {
            // Toggle the type attribute
            const type =
                passwordField.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordField.setAttribute("type", type);

            // Perbarui ikon setelah tipe input berubah
            updateToggleIcon();
        });

        // Panggil fungsi ini sekali saat DOM dimuat untuk mengatur ikon awal
        updateToggleIcon();
});
