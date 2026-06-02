document.addEventListener("DOMContentLoaded", function () {

    const tableBody = document.getElementById("tableBody");
    const modal = document.getElementById("modalForm");
    const openBtn = document.getElementById("openModal");
    const closeBtn = document.getElementById("closeModal");
    const submitBtn = document.querySelector(".btn-submit");

    const uploadBox = document.getElementById("uploadBox");
    const fileInput = document.getElementById("fileInput");
    const preview = document.getElementById("previewImg");
    const uploadLabel = document.querySelector(".upload-label");

    const selected = document.getElementById("selectedStatus");
    const options = document.getElementById("statusOptions");
    const optionItems = document.querySelectorAll(".option");

    let selectedValue = "Tersedia";
    let currentPage = 1;
    const rowsPerPage = 5;

    if (!openBtn || !modal || !tableBody) return;

    selected.innerHTML = `Tersedia <span class="arrow">⌄</span>`;
    selected.className = "status-selected tersedia";

    let arrow = selected.querySelector(".arrow");

    function getRows() {
        return Array.from(tableBody.querySelectorAll("tr"));
    }

    function applyFadeUp(rows) {
        rows.forEach((row, index) => {
            row.classList.remove("fade-up");
            void row.offsetWidth;
            row.classList.add("fade-up");
            row.style.animationDelay = `${index * 0.08}s`;
        });
    }

    function showPage(page) {

        const rows = getRows();

        let totalPages = Math.ceil(rows.length / rowsPerPage);

        if (totalPages === 0) totalPages = 1;

        if (page > totalPages) page = totalPages;
        if (page < 1) page = 1;

        currentPage = page;

        let visibleRows = [];

        rows.forEach((row, index) => {

            const isVisible =
                index >= (page - 1) * rowsPerPage &&
                index < page * rowsPerPage;

            row.style.display =
                isVisible ? "table-row" : "none";

            if (isVisible) {
                visibleRows.push(row);
            }
        });

        applyFadeUp(visibleRows);
        renderPagination();
    }

    function renderPagination() {

        const rows = getRows();

        let totalPages =
            Math.ceil(rows.length / rowsPerPage);

        if (totalPages === 0) totalPages = 1;

        const pagination =
            document.getElementById("pagination");

        if (!pagination) return;

        pagination.innerHTML = "";

        const prev = document.createElement("button");

        prev.innerHTML = "‹";
        prev.disabled = currentPage === 1;

        prev.onclick = () => {
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        };

        pagination.appendChild(prev);

        for (let i = 1; i <= totalPages; i++) {

            const btn = document.createElement("button");

            btn.innerText = i;

            if (i === currentPage) {
                btn.classList.add("active");
            }

            btn.onclick = () => {
                showPage(i);
            };

            pagination.appendChild(btn);
        }

        const next = document.createElement("button");

        next.innerHTML = "›";
        next.disabled = currentPage === totalPages;

        next.onclick = () => {
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        };

        pagination.appendChild(next);
    }

    openBtn.onclick = () => {

        modal.style.display = "flex";

        document.querySelector(".modal-content h2").innerText =
            "Buat Data Aset Mobil";

        document.querySelector(".subtitle").innerText =
            "Masukkan informasi data aset mobil baru dengan lengkap dan benar.";

        uploadLabel.style.display = "block";
        uploadBox.style.display = "block";

        resetForm();
    };

    closeBtn.onclick = () => {

        modal.style.display = "none";
        resetForm();
    };

    window.onclick = function (e) {

        if (e.target === modal) {
            modal.style.display = "none";
            resetForm();
        }
    };

    if (uploadBox && fileInput) {

        uploadBox.onclick = () => fileInput.click();

        fileInput.onchange = function () {

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.src = e.target.result;
                preview.style.display = "block";
            };

            reader.readAsDataURL(file);
        };
    }

    selected.onclick = () => {

        const isOpen =
            options.style.display === "block";

        options.style.display =
            isOpen ? "none" : "block";

        if (arrow) {
            arrow.style.transform =
                isOpen
                    ? "rotate(0deg)"
                    : "rotate(180deg)";
        }
    };

    optionItems.forEach(item => {

        item.onclick = () => {

            const value = item.innerText.trim();

            selected.innerHTML =
                `${value} <span class="arrow">⌄</span>`;

            selected.className = "status-selected";

            selected.classList.add(
                value.toLowerCase().replace(/\s+/g, "-")
            );

            selectedValue = value;

            document.getElementById(
                "statusInput"
            ).value = value;

            options.style.display = "none";

            arrow =
                selected.querySelector(".arrow");
        };
    });

    window.addEventListener("click", function (e) {

        if (!e.target.closest(".status-dropdown")) {

            options.style.display = "none";

            if (arrow) {
                arrow.style.transform =
                    "rotate(0deg)";
            }
        }
    });

    const form = document.querySelector("#modalForm form");

    form.addEventListener("submit", function(e){

        const nama  = document.querySelector('[name="nama_kendaraan"]').value.trim();
        const plat  = document.querySelector('[name="plat_nomor"]').value.trim();
        const tipe  = document.querySelector('[name="tipe"]').value.trim();
        const tahun = document.querySelector('[name="tahun"]').value.trim();

        if(!nama || !plat || !tipe || !tahun){
            e.preventDefault();
            alert("Isi semua data!");
            return;
        }

        document.getElementById("statusInput").value =
            selectedValue || "Tersedia";
    });

    function resetForm() {

        document
            .querySelectorAll(".form input")
            .forEach(input => {
                input.value = "";
            });

        if (fileInput) {
            fileInput.value = "";
        }

        if (preview) {

            preview.src = "";
            preview.style.display = "none";
        }

        selected.innerHTML =
            `Tersedia <span class="arrow">⌄</span>`;

        selected.className =
            "status-selected tersedia";

        selectedValue = "Tersedia";

        document.getElementById(
            "statusInput"
        ).value = "Tersedia";

        arrow =
            selected.querySelector(".arrow");
    }

    showPage(1);
});

const logoutPopup =
    document.getElementById("logoutPopup");

function openLogout() {
    logoutPopup.style.display = "flex";
}

function closeLogout() {
    logoutPopup.style.display = "none";
}

function logout() {
    window.location.href =
        "berandabeforelog.php";
}

if (logoutPopup) {

    logoutPopup.addEventListener(
        "click",
        function (e) {

            if (e.target === logoutPopup) {
                closeLogout();
            }
        }
    );
}

window.openLogout = openLogout;
window.closeLogout = closeLogout;
window.logout = logout;