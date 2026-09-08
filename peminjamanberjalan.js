document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll("#tableBody .row");
  const pagination = document.getElementById("pagination");

  let currentPage = 1;
  const rowsPerPage = 5;

  function showPage(page) {
    currentPage = page;

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    rows.forEach((row, index) => {
      if (index >= start && index < end) {
        row.style.display = "grid";
      } else {
        row.style.display = "none";
      }
    });

    renderPagination();
  }

  function renderPagination() {
    pagination.innerHTML = "";

    const totalPages = Math.ceil(rows.length / rowsPerPage);

    if (totalPages <= 1) return;

    const prev = document.createElement("button");
    prev.innerHTML = "‹";
    prev.disabled = currentPage === 1;

    prev.onclick = function () {
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

      btn.onclick = function () {
        showPage(i);
      };

      pagination.appendChild(btn);
    }

    const next = document.createElement("button");
    next.innerHTML = "›";
    next.disabled = currentPage === totalPages;

    next.onclick = function () {
      if (currentPage < totalPages) {
        showPage(currentPage + 1);
      }
    };

    pagination.appendChild(next);
  }

  showPage(1);
});

// ======================
// LOGOUT
// ======================

function openLogout() {
  document.getElementById("logoutPopup").style.display = "flex";
}

function closeLogout() {
  document.getElementById("logoutPopup").style.display = "none";
}

function logout() {
  window.location.href = "berandabeforelog.php";
}

// ======================
// POPUP TOLAK
// ======================

function openPopupTolak() {
  document.getElementById("popupTolak").style.display = "flex";
}

function closePopupTolak() {
  document.getElementById("popupTolak").style.display = "none";
}

function konfirmasiTolak() {
  const alasan = document.querySelector('input[name="alasan"]:checked');

  if (!alasan) {
    alert("Pilih alasan penolakan terlebih dahulu!");
    return;
  }

  closePopupTolak();
}

// ======================
// POPUP SETUJU
// ======================

function openPopupSetuju() {
  document.getElementById("popupSetuju").style.display = "flex";
}

function closePopupSetuju() {
  document.getElementById("popupSetuju").style.display = "none";
}

function konfirmasiSetuju() {
  closePopupSetuju();
}
