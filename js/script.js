// reservation dot
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("reservationModal");
  const closeBtn = modal.querySelector(".closeR");

  document.querySelectorAll(".openModalBtn").forEach(btn => {
    btn.addEventListener("click", () => {
      modal.style.display = "flex";

      // Tell server to mark reservations as seen
      fetch("./appointment/markDotSeen.php", { method: "POST" })
        .then(() => {
          // Remove dot from UI
          document.querySelectorAll(".reservation-dot").forEach(dot => dot.remove());
        });
    });
  });


  closeBtn.addEventListener("click", () => modal.style.display = "none");
  window.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
  });

  fetch("./appointment/getReservation.php", {
    credentials: "include"
  })
    .then(res => res.text())
    .then(html => document.getElementById("appointmentContainer").innerHTML = html)
    .catch(err => document.getElementById("appointmentContainer").innerHTML = "Error loading reservations.");
});

// Home slider
const homeslider = document.querySelector('.home-slider');
const homeslides = document.querySelectorAll('.homeimg');
let homecurrentIndex = 0;
const totalSlides = homeslides.length;

function homeshowSlide() {
  homecurrentIndex = (homecurrentIndex + 1) % totalSlides;
  homeslider.style.transform = `translateX(-${homecurrentIndex * 100}vw)`;
}
document.getElementById("prevBtnHome").onclick = () => homeshowSlide(index - 1);
document.getElementById("nextBtnHome").onclick = () => homeshowSlide(index + 1);
setInterval(homeshowSlide, 3000);


// Review slider
const slider = document.getElementById("slider");
const slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide(i) {
  index = (i + slides.length) % slides.length;
  slider.style.transform = `translateX(-${index * 100}%)`;
}

document.getElementById("prevBtn").onclick = () => showSlide(index - 1);
document.getElementById("nextBtn").onclick = () => showSlide(index + 1);
setInterval(() => showSlide(index + 1), 5000);