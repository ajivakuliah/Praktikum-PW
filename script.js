document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("darkToggle");
  const yearSpan = document.getElementById("year");

  if (!toggleBtn) return; // Prevent errors if button missing

  // Apply initial mode based on localStorage, otherwise follow prefers-color-scheme
  const saved = localStorage.getItem("darkMode");
  if (saved === null) {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.body.classList.add("dark-mode");
    }
  } else if (saved === "true") {
    document.body.classList.add("dark-mode");
  }

  toggleBtn.textContent = document.body.classList.contains("dark-mode") ? "Mode Terang" : "Mode Gelap";

  toggleBtn.addEventListener("click", () => {
    const isDark = document.body.classList.toggle("dark-mode");
    localStorage.setItem("darkMode", isDark);
    toggleBtn.textContent = isDark ? "Mode Terang" : "Mode Gelap";
  });

  if (yearSpan) yearSpan.textContent = new Date().getFullYear();
});
