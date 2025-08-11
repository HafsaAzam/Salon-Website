document.addEventListener("DOMContentLoaded", function () {
    const cookieConsent = document.getElementById("cookieConsent");

    if (!localStorage.getItem("cookieConsentGiven")) {
        requestAnimationFrame(() => {
            setTimeout(() => {
                cookieConsent.classList.add("visible");
                document.body.classList.add("modal-open");
            }, 50);
        });
    }

    function hideBanner() {
        cookieConsent.classList.remove("visible");
        document.body.classList.remove("modal-open");
    }

    document.getElementById("acceptBtn").addEventListener("click", function () {
        localStorage.setItem("cookieConsentGiven", "accepted");
        fetch("set_cookie.php?consent=accepted").then(() => {});
        hideBanner();
    });

    document.getElementById("rejectBtn").addEventListener("click", function () {
        localStorage.setItem("cookieConsentGiven", "rejected");
        hideBanner();
    });
});
