function openEdit() {
  document.getElementById("editPopup").style.display = "flex";
}

function closeEdit() {
  document.getElementById("editPopup").style.display = "none";
}

function openLogout() {
  document.getElementById("logoutPopup").style.display = "flex";
}

function closeLogout() {
  document.getElementById("logoutPopup").style.display = "none";
}

function logout() {
  window.location.href = "berandabeforelog.php";
}

function openCancelPopup(idPeminjaman) {
  const cancelId = document.getElementById("cancel_id");

  if (cancelId) {
    cancelId.value = idPeminjaman;
  }

  document.getElementById("cancelPopup").style.display = "flex";
}

function closeCancelPopup() {
  document.getElementById("cancelPopup").style.display = "none";
}

function openReturnPopup(idPeminjaman) {
  const returnId = document.getElementById("return_id");

  if (returnId) {
    returnId.value = idPeminjaman;
  }

  document.getElementById("returnPopup").style.display = "flex";
}

function closeReturnPopup() {
  document.getElementById("returnPopup").style.display = "none";
}

function saveEdit() {
  let telpInput = document.querySelector('#editPopup input[type="text"]');

  let passInput = document.querySelector('#editPopup input[type="password"]');

  if (!telpInput || !passInput) {
    return;
  }

  let telp = telpInput.value;
  let pass = passInput.value;

  let telpView = document.querySelector(".data p:nth-child(3) .value");

  let passView = document.querySelector(".data p:nth-child(4) .value");

  if (telpView) {
    telpView.innerText = telp;
  }

  if (pass !== "" && passView) {
    passView.innerText = "********";
  }

  let popup = document.querySelector("#editPopup .popup-content");

  if (!popup) {
    return;
  }

  popup.style.transform = "translateY(-20px)";

  popup.style.opacity = "0";

  setTimeout(() => {
    closeEdit();

    popup.style.transform = "translateY(0)";

    popup.style.opacity = "1";

    alert("Profil berhasil diubah!");
  }, 300);
}

function triggerFadeUp(items) {
  items.forEach((item, index) => {
    item.style.animation = "none";

    void item.offsetWidth;

    item.style.animation = "fadeUpPage .5s ease forwards";

    item.style.animationDelay = `${index * 0.08}s`;
  });
}

function createPagination(itemsSelector, paginationId, perPage = 2) {
  const items = document.querySelectorAll(itemsSelector);

  const pagination = document.getElementById(paginationId);

  if (items.length === 0 || !pagination) {
    return;
  }

  let currentPage = 1;

  const totalPages = Math.ceil(items.length / perPage);

  function showPage(page) {
    currentPage = page;

    let visibleItems = [];

    items.forEach((item, index) => {
      const visible = index >= (page - 1) * perPage && index < page * perPage;

      item.style.display = visible ? "block" : "none";

      let divider = item.nextElementSibling;

      if (divider && divider.classList.contains("divider")) {
        divider.style.display = visible ? "block" : "none";
      }

      if (visible) {
        visibleItems.push(item);
      }
    });

    renderButtons();

    triggerFadeUp(visibleItems);
  }

  function renderButtons() {
    pagination.innerHTML = "";

    const prevBtn = document.createElement("button");

    prevBtn.innerHTML = "‹";

    prevBtn.disabled = currentPage === 1;

    prevBtn.onclick = () => {
      if (currentPage > 1) {
        showPage(currentPage - 1);
      }
    };

    pagination.appendChild(prevBtn);

    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement("button");

      btn.innerText = i;

      if (i === currentPage) {
        btn.classList.add("active");
      }

      btn.onclick = () => {
        if (i !== currentPage) {
          showPage(i);
        }
      };

      pagination.appendChild(btn);
    }

    const nextBtn = document.createElement("button");

    nextBtn.innerHTML = "›";

    nextBtn.disabled = currentPage === totalPages;

    nextBtn.onclick = () => {
      if (currentPage < totalPages) {
        showPage(currentPage + 1);
      }
    };

    pagination.appendChild(nextBtn);
  }

  showPage(1);
}

document.addEventListener("DOMContentLoaded", function () {
  document.body.classList.add("show");

  const elements = document.querySelectorAll(".fade-up");

  elements.forEach((el, i) => {
    setTimeout(() => {
      el.classList.add("show");
    }, i * 150);
  });

  createPagination(".riwayat-item", "riwayatPagination", 2);

  createPagination(".status-item", "statusPagination", 2);
});
