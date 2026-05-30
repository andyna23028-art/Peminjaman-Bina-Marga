window.currentTab = "mobil";
window.data = window.peminjamanData;
window.selectedIndex = null;
window.renderTableGlobal = null;

document.addEventListener("DOMContentLoaded", function () {

    const tabs = document.querySelectorAll(".tab");
    const tableBody = document.getElementById("tableBody");
    const pagination = document.getElementById("pagination");

    let currentPage = 1;
    const rowsPerPage = 5;

    function animateRowsFadeUp() {

        const rows = document.querySelectorAll(".row");

        rows.forEach((row, index) => {

            row.style.animation = "none";

            row.offsetHeight;

            row.style.animation =
                `fadeUpPage 0.5s ease forwards`;

            row.style.animationDelay =
                `${index * 0.08}s`;
        });
    }

    function renderTable(kategori) {

        tableBody.innerHTML = "";

        if (
            !window.data[kategori] ||
            window.data[kategori].length === 0
        ) {

            tableBody.innerHTML = `
                <div style="
                    height:420px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:18px;
                    color:#666;
                    font-weight:500;
                ">
                    Tidak ada data
                </div>
            `;

            renderPagination();
            return;
        }

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        const paginatedData =
            window.data[kategori].slice(start, end);

        paginatedData.forEach((item, index) => {

            const realIndex = start + index;

            if (!item.status) {
                item.status = "Diproses";
            }

            const row = document.createElement("div");

            row.classList.add("row");

            row.style.opacity = "0";

            row.innerHTML = `

                <div class="nomor">
                    ${String(realIndex + 1).padStart(2, "0")}
                </div>

                <div>
                    <img src="${item.gambar}" width="60">
                </div>

                <div>${item.nama}</div>

                <div>${item.plat ?? '-'}</div>

                <div>${item.tipe ?? '-'}</div>

                <div>${item.tahun ?? '-'}</div>

                <div class="status-box">
                    <span class="status-badge ${item.status}">
                        ${item.status}
                    </span>
                </div>

                <div class="aksi">

                    ${item.status === "Diproses" ? `

                        <div
                            class="btn-tolak"
                            data-index="${realIndex}"
                        >
                            <img
                                src="images/tolak.png"
                                data-index="${realIndex}"
                            >
                        </div>

                        <div
                            class="btn-terima"
                            data-index="${realIndex}"
                        >
                            <img
                                src="images/terima.png"
                                data-index="${realIndex}"
                            >
                        </div>

                    ` : ``}

                </div>
            `;

            tableBody.appendChild(row);

        });

        if (paginatedData.length < rowsPerPage) {

            const emptyHeight =
                (rowsPerPage - paginatedData.length) * 85;

            const filler = document.createElement("div");

            filler.style.height = `${emptyHeight}px`;

            tableBody.appendChild(filler);

        }

        renderPagination();

        setTimeout(() => {
            animateRowsFadeUp();
        }, 10);
    }

    function renderPagination() {

        const totalData =
            window.data[window.currentTab].length;

        const totalPages =
            Math.ceil(totalData / rowsPerPage) || 1;

        pagination.innerHTML = "";

        const prev = document.createElement("button");

        prev.innerHTML = "‹";

        prev.disabled = currentPage === 1;

        prev.onclick = () => {

            if (currentPage > 1) {

                currentPage--;

                renderTable(window.currentTab);

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

                currentPage = i;

                renderTable(window.currentTab);

            };

            pagination.appendChild(btn);

        }

        const next = document.createElement("button");

        next.innerHTML = "›";

        next.disabled = currentPage === totalPages;

        next.onclick = () => {

            if (currentPage < totalPages) {

                currentPage++;

                renderTable(window.currentTab);

            }

        };

        pagination.appendChild(next);

    }

    window.renderTableGlobal = renderTable;

    tabs.forEach(tab => {

        tab.addEventListener("click", function () {

            tabs.forEach(t => {
                t.classList.remove("active");
            });

            this.classList.add("active");

            window.currentTab = this.dataset.tab;

            currentPage = 1;

            renderTable(window.currentTab);

        });

    });

    document.addEventListener("click", function(e) {

        const btnTolak = e.target.closest(".btn-tolak");

        if (btnTolak) {

            window.selectedIndex =
                parseInt(btnTolak.dataset.index);

            document.getElementById("popupTolak")
                .style.display = "flex";

            return;
        }

        const btnTerima = e.target.closest(".btn-terima");

        if (btnTerima) {

            window.selectedIndex =
                parseInt(btnTerima.dataset.index);

            document.getElementById("popupSetuju")
                .style.display = "flex";

            return;
        }

    });

    renderTable(window.currentTab);

});


function closePopupTolak() {

    document.getElementById("popupTolak")
        .style.display = "none";
}


function konfirmasiTolak() {

    const checked = document.querySelector(
        'input[name="alasan"]:checked'
    );

    if (!checked) {

        alert("Pilih alasan penolakan!");

        return;
    }

    const item =
        window.data[window.currentTab][window.selectedIndex];

    item.status = "Ditolak";

    window.data[window.currentTab].splice(
        window.selectedIndex,
        1
    );

    window.data[window.currentTab].push(item);

    document.getElementById("popupTolak")
        .style.display = "none";

    document
        .querySelectorAll('input[name="alasan"]')
        .forEach(r => {
            r.checked = false;
        });

    window.renderTableGlobal(window.currentTab);
}


function closePopupSetuju() {

    document.getElementById("popupSetuju")
        .style.display = "none";
}


function konfirmasiSetuju() {

    const item =
        window.data[window.currentTab][window.selectedIndex];

    item.status = "Diterima";

    window.data[window.currentTab].splice(
        window.selectedIndex,
        1
    );

    window.data[window.currentTab].push(item);

    document.getElementById("popupSetuju")
        .style.display = "none";

    window.renderTableGlobal(window.currentTab);
}


function openLogout() {

    document.getElementById("logoutPopup")
        .style.display = "flex";
}


function closeLogout() {

    document.getElementById("logoutPopup")
        .style.display = "none";
}


function logout() {

    window.location.href = "berandabeforelog.php";
}