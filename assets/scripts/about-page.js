document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".btn-book");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      const book = button.closest(".book");
      const desc = book.querySelector(".book-desc");
      const overlay = book.querySelector(".dark-overlay");
      desc.classList.toggle("hidden");
      overlay.classList.toggle("hidden");
    });
  });

  document.querySelectorAll(".close-modal").forEach((closeBtn) => {
    closeBtn.addEventListener("click", () => {
      const book = closeBtn.closest(".book");
      const desc = book.querySelector(".book-desc");
      const overlay = book.querySelector(".dark-overlay");

      desc.classList.add("hidden");
      overlay.classList.add("hidden");
    });
  });

  document.querySelectorAll(".dark-overlay").forEach((overlay) => {
    overlay.addEventListener("click", () => {
      overlay.classList.add("hidden");
      overlay.previousElementSibling.classList.add("hidden");
    });
  });
});
