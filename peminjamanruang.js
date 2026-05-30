document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".filter button");
    const cards = document.querySelectorAll(".card");
    const elements = document.querySelectorAll(".fade-up");

  
    elements.forEach((el, i) => {
        setTimeout(() => {
            el.classList.add("show");
        }, i * 120);
    });

   
    cards.forEach(card => {
        card.style.display = "flex";
    });

  
    buttons.forEach(button => {
        button.addEventListener("click", () => {

            
            buttons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");

            const filter = button.dataset.filter;

            cards.forEach((card, i) => {
                const status = card.dataset.status;

                if (status === filter) {
                    card.style.display = "flex";

                  
                    card.classList.remove("show");
                    void card.offsetWidth;

                    setTimeout(() => {
                        card.classList.add("show");
                    }, i * 100);

                } else {
                    card.style.display = "none";
                }
            });

        });
    });

});