console.log("Script loaded.");
// Animate elements on scroll
document.addEventListener("DOMContentLoaded", () => {
  const animatedElements = document.querySelectorAll(".animated");
  
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        entry.target.style.opacity = 1;
      }
    });
  }, { threshold: 0.1 });

  animatedElements.forEach(el => observer.observe(el));
});
