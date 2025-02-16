const menuToggle = document.querySelector(".mobile-toggle");
const mobileMenu = document.querySelector(".mobile-menu-list");

menuToggle.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});

document.addEventListener("click", (e) => {
  if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
    mobileMenu.classList.add("hidden");
  }
});

// Prevent the click event from propagating to the document when clicking inside the menu
mobileMenu.addEventListener("click", (e) => {
  e.stopPropagation();
});
