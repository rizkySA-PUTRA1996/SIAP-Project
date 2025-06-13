const profileBtn = document.getElementById("profileBtn");
const profilePopup = document.getElementById("profilePopup");

if (profileBtn && profilePopup) {
    profileBtn.addEventListener("click", (event) => {
        event.stopPropagation();
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
