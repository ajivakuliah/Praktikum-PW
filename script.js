const toggleBtn = document.getElementById("darkToggle");

// Apply initial mode based on localStorage, otherwise follow prefers-color-scheme
(function applyInitialMode() {
  const saved = localStorage.getItem("darkMode");
  if (saved === null) {
    // if user hasn't chosen, use system preference
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.body.classList.add("dark-mode");
    }
  } else if (saved === "true") {
    document.body.classList.add("dark-mode");
  }
  // set button label accordingly
  toggleBtn.textContent = document.body.classList.contains("dark-mode") ? "Mode Terang" : "Mode Gelap";
})();

toggleBtn.addEventListener("click", () => {
  const isDark = document.body.classList.toggle("dark-mode");
  localStorage.setItem("darkMode", isDark);
  toggleBtn.textContent = isDark ? "Mode Terang" : "Mode Gelap";
});

// Year
document.getElementById("year").textContent = new Date().getFullYear();
