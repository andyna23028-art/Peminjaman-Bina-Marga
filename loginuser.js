document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");

    if (!form) return;

    form.addEventListener("submit", function (event) {

        const username = form["username"].value.trim();
        const nip = form["nip"].value.trim();
        const password = form["password"].value;

        // Validasi Username
        if (username === "") {
            alert("Username tidak boleh kosong!");
            event.preventDefault();
            return;
        }

        if (username.length < 3) {
            alert("Username minimal 3 karakter!");
            event.preventDefault();
            return;
        }

        // Validasi NIP
        if (nip === "") {
            alert("NIP tidak boleh kosong!");
            event.preventDefault();
            return;
        }

        if (!/^[0-9]+$/.test(nip)) {
            alert("NIP harus berupa angka!");
            event.preventDefault();
            return;
        }

        if (nip.length < 5) {
            alert("NIP minimal 5 digit!");
            event.preventDefault();
            return;
        }

        // Validasi Password
        if (password.length < 8) {
            alert("Password minimal 8 karakter!");
            event.preventDefault();
            return;
        }

    });

});