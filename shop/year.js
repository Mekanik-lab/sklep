document.addEventListener('DOMContentLoaded', () => {
    const year = document.getElementById("year");
    year.textContent = new Date().getFullYear();
});