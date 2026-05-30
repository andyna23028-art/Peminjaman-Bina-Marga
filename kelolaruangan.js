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

    let selectedValue = "";
    let currentPage = 1;
    const rowsPerPage = 5;
    let editRow = null;

    if (!openBtn || !tableBody) return;

    if (selected) {

        selected.innerHTML =
            `Status <span class="arrow">⌄</span>`;

        selected.className = "status-selected";
    }

    let arrow =
        selected
            ? selected.querySelector(".arrow")
            : null;

    function getRows() {

        return Array.from(
            document.querySelectorAll(".row-ruangan")
        );
    }

    function animateTableFade() {

        const rows = getRows();

        let visibleIndex = 0;

        rows.forEach(row => {

            if (row.style.display !== "none") {

                row.style.animation = "none";

                void row.offsetWidth;

                row.style.animation =
                    `fadeUpRow 0.5s ease forwards`;

                row.style.animationDelay =
                    `${visibleIndex * 0.08}s`;

                visibleIndex++;
            }
        });
    }

    function showPage(page) {

        const rows = getRows();

        let totalPages =
            Math.ceil(rows.length / rowsPerPage);

        if (totalPages === 0) {
            totalPages = 1;
        }

        if (page > totalPages) {
            page = totalPages;
        }

        if (page < 1) {
            page = 1;
        }

        currentPage = page;

        rows.forEach((row, index) => {

            row.style.display =
                (
                    index >= (page - 1) * rowsPerPage &&
                    index < page * rowsPerPage
                )
                    ? "table-row"
                    : "none";
        });

        renderPagination();

        animateTableFade();
    }

    function renderPagination() {

        const rows = getRows();

        let totalPages =
            Math.ceil(rows.length / rowsPerPage);

        if (totalPages === 0) {
            totalPages = 1;
        }

        const pagination =
            document.getElementById("pagination");

        if (!pagination) return;

        pagination.innerHTML = "";

        const prev = document.createElement("button");

        prev.innerHTML = "‹";

        prev.classList.add("prev");

        prev.disabled = currentPage === 1;

        prev.onclick = () => {

            if (currentPage > 1) {

                showPage(currentPage - 1);
            }
        };

        pagination.appendChild(prev);

        for (let i = 1; i <= totalPages; i++) {

            const btn =
                document.createElement("button");

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

        next.classList.add("next");

        next.disabled =
            currentPage === totalPages;

        next.onclick = () => {

            if (currentPage < totalPages) {

                showPage(currentPage + 1);
            }
        };

        pagination.appendChild(next);
    }

    openBtn.onclick = () => {

        modal.style.display = "flex";

        document.querySelector(
            ".modal-content h2"
        ).innerText =
            "Buat Data Aset Ruangan";

        document.querySelector(
            ".subtitle"
        ).innerText =
            "Masukkan informasi aset ruangan baru dengan lengkap dan benar.";

        uploadLabel.style.display = "block";

        uploadBox.style.display = "block";

        submitBtn.innerText = "Tambah";

        editRow = null;

        resetForm();
    };

    closeBtn.onclick = () => {

        modal.style.display = "none";

        resetForm();
    };

    window.addEventListener("click", function (e) {

        if (e.target === modal) {

            modal.style.display = "none";

            resetForm();
        }

        if (!e.target.closest(".status-dropdown")) {

            options.style.display = "none";

            if (arrow) {

                arrow.style.transform =
                    "rotate(0deg)";
            }
        }
    });

    uploadBox.onclick = () => {

        fileInput.click();
    };

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

            const value = item.innerText;

            selected.innerHTML =
                `${value} <span class="arrow">⌄</span>`;

            selected.className =
                "status-selected";

            selected.classList.add(
                value.toLowerCase()
                .replace(/\s+/g, '-')
            );

            selectedValue = value;

            options.style.display = "none";

            arrow =
                selected.querySelector(".arrow");
        };
    });

    function bindActions(row) {

        const editBtn =
            row.querySelector(".edit");

        const deleteBtn =
            row.querySelector(".delete");

        editBtn.onclick = () => {

            const cells =
                row.querySelectorAll("td");

            const inputs =
                document.querySelectorAll(
                    ".form input"
                );

            inputs[0].value =
                cells[1].innerText;

            inputs[1].value =
                cells[2].innerText;

            inputs[2].value =
                cells[3].innerText;

            inputs[3].value =
                cells[4].innerText;

            const statusText =
                row.querySelector(".status")
                .innerText;

            selected.innerHTML =
                `${statusText} <span class="arrow">⌄</span>`;

            selected.className =
                "status-selected " +
                statusText.toLowerCase()
                .replace(/\s+/g, '-');

            selectedValue = statusText;

            arrow =
                selected.querySelector(".arrow");

            editRow = row;

            document.querySelector(
                ".modal-content h2"
            ).innerText =
                "Update Data Aset Ruangan";

            document.querySelector(
                ".subtitle"
            ).innerText =
                "Perbarui informasi data aset ruangan dengan lengkap dan benar.";

            uploadLabel.style.display =
                "none";

            uploadBox.style.display =
                "none";

            submitBtn.innerText =
                "Update";

            modal.style.display = "flex";
        };

        deleteBtn.onclick = () => {

            const popup =
                document.createElement("div");

            popup.classList.add(
                "delete-popup"
            );

            popup.innerHTML = `
                <div class="delete-box">

                    <img src="images/hapus.png" class="delete-img">

                    <h2>Hapus Data Aset Ruangan?</h2>

                    <p>Data akan dihapus permanen</p>

                    <div class="delete-buttons">

                        <button class="btn-batal-delete">
                            Batal
                        </button>

                        <button class="btn-hapus-delete">
                            Hapus
                        </button>

                    </div>

                </div>
            `;

            document.body.appendChild(
                popup
            );

            popup.querySelector(
                ".btn-batal-delete"
            ).onclick = () => {

                popup.remove();
            };

            popup.querySelector(
                ".btn-hapus-delete"
            ).onclick = () => {

                row.remove();

                popup.remove();

                updateNumbering();

                const totalPages =
                    Math.ceil(
                        getRows().length /
                        rowsPerPage
                    ) || 1;

                if (currentPage > totalPages) {

                    currentPage = totalPages;
                }

                showPage(currentPage);
            };
        };
    }

    getRows().forEach(bindActions);

    submitBtn.onclick = () => {

        const inputs =
            document.querySelectorAll(
                ".form input"
            );

        const nama =
            inputs[0].value.trim();

        const lantai =
            inputs[1].value.trim();

        const kode =
            inputs[2].value.trim();

        const kapasitas =
            inputs[3].value.trim();

        if (
            !nama ||
            !lantai ||
            !kode ||
            !kapasitas
        ) {

            alert("Isi semua data!");

            return;
        }

        const status =
            selectedValue || "Tersedia";

        if (editRow) {

            const cells =
                editRow.querySelectorAll("td");

            cells[1].innerText = nama;
            cells[2].innerText = lantai;
            cells[3].innerText = kode;
            cells[4].innerText = kapasitas;

            cells[5].innerHTML = `
                <span class="status ${status.toLowerCase()}">
                    ${status}
                </span>
            `;

            tableBody.prepend(editRow);

            editRow = null;
        }

        else {

            const imageSrc =
                preview.style.display === "block"
                    ? preview.src
                    : "images/default.png";

            const row =
                document.createElement("tr");

            row.classList.add(
                "row-ruangan"
            );

            row.innerHTML = `
                <td>
                    00.
                    <img src="${imageSrc}" class="mobil-img">
                </td>

                <td>${nama}</td>
                <td>${lantai}</td>
                <td>${kode}</td>
                <td>${kapasitas}</td>

                <td class="status-cell">
                    <span class="status ${status.toLowerCase()}">
                        ${status}
                    </span>
                </td>

                <td>
                    <div class="action">

                        <div class="edit">
                            <img src="images/editfile.png">
                        </div>

                        <div class="delete">
                            <img src="images/hapusfile.png">
                        </div>

                    </div>
                </td>
            `;

            tableBody.prepend(row);

            bindActions(row);
        }

        updateNumbering();

        currentPage = 1;

        resetForm();

        modal.style.display = "none";

        showPage(1);
    };

    function updateNumbering() {

        const rows = getRows();

        rows.forEach((row, index) => {

            const cell =
                row.querySelector("td");

            const img =
                cell.querySelector("img");

            cell.innerHTML =
                `${(index + 1)
                    .toString()
                    .padStart(2, "0")}. `;

            if (img) {

                cell.appendChild(img);
            }
        });
    }

    function resetForm() {

        document.querySelectorAll(
            ".form input"
        ).forEach(input => {

            input.value = "";
        });

        fileInput.value = "";

        preview.src = "";

        preview.style.display = "none";

        selected.innerHTML =
            `Status <span class="arrow">⌄</span>`;

        selected.className =
            "status-selected";

        selectedValue = "";

        arrow =
            selected.querySelector(".arrow");

        if (!editRow) {

            submitBtn.innerText =
                "Tambah";
        }
    }

    showPage(1);

    updateNumbering();
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