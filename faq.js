
window.addEventListener("load", () => {
    document.body.classList.add("show");
});


document.addEventListener("DOMContentLoaded", function () {

    const items = document.querySelectorAll(".faq-item");

    items.forEach(item => {
        item.querySelector(".faq-question").onclick = () => {

            items.forEach(i => {
                if(i !== item) i.classList.remove("active");
            });

            item.classList.toggle("active");
        };
    });

});