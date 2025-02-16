document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".toggle-btn");
  const toggleContent = document.querySelector(".toggle-content");
  const arrow = document.querySelector(".arrow");

  toggleBtn.addEventListener("click", function () {
    if (toggleContent.classList.contains("open")) {
      toggleContent.classList.remove("open");
      toggleBtn.textContent = "Przelew na rachunek";
      toggleBtn.prepend(arrow);
      arrow.style.transform = "rotate(0deg)";
    } else {
      toggleContent.classList.add("open");
      toggleBtn.textContent = "Schowaj";
      toggleBtn.prepend(arrow);
      arrow.style.transform = "rotate(180deg)";
    }
  });
});
