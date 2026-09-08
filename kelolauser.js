document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("popupHapus");
    const btnBatal = document.getElementById("btnBatal");
    const btnHapus = document.querySelector(".btn-hapus");

    const logoutPopup = document.getElementById("logoutPopup");
    const logoutBtn = document.querySelector(".logout");

    const tableBody = document.querySelector(".table-body");
    const pagination = document.getElementById("pagination");

    // ===== IMPORT =====
    const popupImport = document.getElementById("popupImport");
    const btnBatalImport = document.getElementById("btnBatalImport");
    const btnImport = document.getElementById("btnImport");
    const btnImportPopup = document.querySelector(".btn-import");
    // ==================

    let selectedRow = null;
    let selectedId = null;

    let currentPage = 1;
    const rowsPerPage = 5;

    function getRows() {

        return Array.from(
            document.querySelectorAll(".row")
        );
    }

    function animateRowsFadeUp() {

        const rows = getRows();

        rows.forEach((row, index) => {

            if (row.style.display !== "none") {

                row.style.animation = "none";

                row.offsetHeight;

                row.style.opacity = "0";

                row.style.animation =
                    `fadeUpRow 0.5s ease forwards`;

                row.style.animationDelay =
                    `${index * 0.08}s`;
            }
        });
    }

    function showEmptyState() {

        const rows = getRows();

        const oldEmpty =
            document.querySelector(".empty-data");

        if (oldEmpty) {

            oldEmpty.remove();
        }

        if (rows.length === 0) {

            const empty = document.createElement("div");

            empty.classList.add("empty-data");

            empty.style.flex = "1";
            empty.style.display = "flex";
            empty.style.alignItems = "center";
            empty.style.justifyContent = "center";
            empty.style.fontSize = "18px";
            empty.style.fontWeight = "500";
            empty.style.color = "#555";

            empty.innerText = "Tidak ada data";

            tableBody.appendChild(empty);
        }
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

            const start =
                (page - 1) * rowsPerPage;

            const end =
                page * rowsPerPage;

            row.style.display =
                (index >= start && index < end)
                    ? "grid"
                    : "none";
        });

        renderPagination();

        showEmptyState();

        animateRowsFadeUp();
    }

    function renderPagination() {

        const rows = getRows();

        let totalPages =
            Math.ceil(rows.length / rowsPerPage);

        if (totalPages === 0) {

            totalPages = 1;
        }

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

                if (currentPage !== i) {

                    showPage(i);
                }
            };

            pagination.appendChild(btn);
        }

        const next = document.createElement("button");

        next.innerHTML = "›";

        next.disabled =
            currentPage === totalPages;

        next.onclick = () => {

            if (currentPage < totalPages) {

                showPage(currentPage + 1);
            }
        };

        pagination.appendChild(next);
    }

    function bindDelete() {

        document
            .querySelectorAll(".btn-delete")
            .forEach(btn => {

                btn.onclick = function () {

                    selectedId = this.dataset.id;

                    console.log(selectedId);

                    popup.style.display = "flex";
                };

            });
    }

    bindDelete();

    // ===== IMPORT POPUP =====

if (btnImportPopup) {

    btnImportPopup.addEventListener("click", () => {

        popupImport.style.display = "flex";
    });
}

if (btnBatalImport) {

    btnBatalImport.addEventListener("click", () => {

        popupImport.style.display = "none";
    });
}

if (btnImport) {

    btnImport.addEventListener("click", () => {

        const file =
            document.getElementById("fileImport").files[0];

        if (!file) {

            alert("Silakan pilih file Excel terlebih dahulu");
            return;
        }

        alert("Data berhasil diimport");

        document.getElementById("fileImport").value = "";

        popupImport.style.display = "none";
    });
}

if (popupImport) {

    popupImport.addEventListener("click", function (e) {

        if (e.target === popupImport) {

            popupImport.style.display = "none";
        }
    });
}
// ===== UPLOAD EXCEL =====

const uploadExcelBox =
    document.getElementById("uploadExcelBox");

const fileImport =
    document.getElementById("fileImport");

const fileNameExcel =
    document.getElementById("fileNameExcel");

if(uploadExcelBox){

    uploadExcelBox.addEventListener("click",()=>{

        fileImport.click();

    });

    fileImport.addEventListener("change",function(){

        if(this.files.length){

            fileNameExcel.innerText =
                this.files[0].name;
        }

    });

}

// ========================
    // ========================

    btnBatal.addEventListener("click", () => {

        popup.style.display = "none";

        selectedId = null;
    });

    btnHapus.addEventListener("click", () => {

        if (selectedId) {

            window.location.href =
                "hapus_user.php?hapus=" + selectedId;
        }

    });

    popup.addEventListener("click", function (e) {

        if (e.target === popup) {

            popup.style.display = "none";

            selectedId = null;
        }
    });

    function updateNumbering() {

        const rows = getRows();

        rows.forEach((row, index) => {

            row.querySelector(".no").innerText =
                (index + 1) + ".";
        });
    }

    logoutBtn.addEventListener("click", () => {

        logoutPopup.style.display = "flex";
    });

    logoutPopup.addEventListener("click", function (e) {

        if (e.target === logoutPopup) {

            closeLogout();
        }
    });

    window.closeLogout = function () {

        logoutPopup.style.display = "none";
    };

    window.logout = function () {

        window.location.href =
            "berandabeforelog.php";
    };

    showPage(currentPage);

});