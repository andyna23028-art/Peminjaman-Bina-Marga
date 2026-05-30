document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("popupHapus");
    const btnBatal = document.getElementById("btnBatal");
    const btnHapus = document.querySelector(".btn-hapus");

    const logoutPopup = document.getElementById("logoutPopup");
    const logoutBtn = document.querySelector(".logout");

    const tableBody = document.querySelector(".table-body");
    const pagination = document.getElementById("pagination");

    let selectedRow = null;

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
            .querySelectorAll(".delete img")
            .forEach(btn => {

                btn.onclick = function () {

                    selectedRow =
                        this.closest(".row");

                    popup.style.display = "flex";
                };
            });
    }

    bindDelete();

    
    btnBatal.addEventListener("click", () => {

        popup.style.display = "none";

        selectedRow = null;
    });

    
    btnHapus.addEventListener("click", () => {

        if (selectedRow) {

            selectedRow.remove();
        }

        popup.style.display = "none";

        selectedRow = null;

        updateNumbering();

        const rows = getRows();

        const totalPages =
            Math.ceil(rows.length / rowsPerPage) || 1;

        if (currentPage > totalPages) {

            currentPage = totalPages;
        }

        showPage(currentPage);
    });

    
    popup.addEventListener("click", function (e) {

        if (e.target === popup) {

            popup.style.display = "none";

            selectedRow = null;
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