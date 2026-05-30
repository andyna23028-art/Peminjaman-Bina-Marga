
document.addEventListener("DOMContentLoaded", () => {

    
    const faders = document.querySelectorAll(".fade-up");

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            entry.target.classList.add("show");
            obs.unobserve(entry.target);
        });
    }, {
        threshold: 0.2
    });

    faders.forEach(el => observer.observe(el));

});


function scrollKeKategori() {
    const section = document.getElementById("kategori");

    if (section) {
        section.scrollIntoView({
            behavior: "smooth",
            block: "start" 
        });
    }
}