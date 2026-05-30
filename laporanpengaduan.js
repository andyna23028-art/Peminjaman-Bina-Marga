const tableBody = document.getElementById("tableBody");
const pagination = document.getElementById("pagination");

let currentPage = 1;
const rowsPerPage = 5;

let selectedIndex = null;


function triggerFadeUpRows() {

    const rows = document.querySelectorAll(".table-row");

    rows.forEach((row, index) => {

        row.style.animation = "none";

        void row.offsetWidth;

        row.style.animation =
            `fadeUpPage 0.5s ease forwards`;

        row.style.animationDelay =
            `${index * 0.08}s`;

    });

}


function renderTable(){

    tableBody.innerHTML = "";

    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    const paginatedData =
        window.dataPengaduan.slice(start, end);

    
    if(paginatedData.length === 0){

        tableBody.innerHTML = `

            <div class="empty-data"
                 style="
                    height:420px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:18px;
                    font-weight:600;
                    color:#666;
                 ">
                Tidak ada laporan pengaduan
            </div>

        `;

        renderPagination();
        return;
    }

   
    paginatedData.forEach((item,index)=>{

        const realIndex = start + index;

        tableBody.innerHTML += `
        
        <div class="table-row">

            <div class="no">
                ${String(realIndex + 1).padStart(2,"0")}
            </div>

            <div class="nama">
                ${item.nama}
            </div>

            <div class="nip">
                ${item.nip}
            </div>

            <div class="keluhan">
                ${item.keluhan}
            </div>

            <div class="status">

                <select 
                    class="${getStatusClass(item.status)}"
                    onchange="changeStatus(this, ${realIndex})"
                >

                    <option 
                        value="Belum"
                        ${item.status === "Belum" ? "selected" : ""}
                    >
                        Belum
                    </option>

                    <option 
                        value="Diproses"
                        ${item.status === "Diproses" ? "selected" : ""}
                    >
                        Diproses
                    </option>

                    <option 
                        value="Disetujui"
                        ${item.status === "Disetujui" ? "selected" : ""}
                    >
                        Disetujui
                    </option>

                    <option 
                        value="Ditolak"
                        ${item.status === "Ditolak" ? "selected" : ""}
                    >
                        Ditolak
                    </option>

                </select>

            </div>

            <div class="action">

                <!-- PRINT -->
                <img 
                    src="images/print.png"
                    class="btn-print"
                    data-index="${realIndex}"
                >

                <!-- DELETE -->
                <img 
                    src="images/hapusfile.png"
                    class="btn-delete"
                    data-index="${realIndex}"
                >

            </div>

        </div>

        `;
    });

    bindDelete();
    bindPrint();

    renderPagination();

    
    triggerFadeUpRows();

}


function bindPrint(){

    document
        .querySelectorAll(".btn-print")
        .forEach(btn=>{

            btn.onclick = function(){

                const index =
                    Number(this.dataset.index);

                const data =
                    window.dataPengaduan[index];

                const url =
                    `printpengaduan.php?` +
                    `nama=${encodeURIComponent(data.nama)}` +
                    `&nip=${encodeURIComponent(data.nip)}` +
                    `&keluhan=${encodeURIComponent(data.keluhan)}` +
                    `&status=${encodeURIComponent(data.status)}`;

                window.open(url, "_blank");

            };

        });

}


function bindDelete(){

    document
        .querySelectorAll(".btn-delete")
        .forEach(btn=>{

            btn.onclick = function(){

                selectedIndex =
                    Number(this.dataset.index);

                popupHapus.style.display = "flex";

            };

        });

}


function getStatusClass(status){

    switch(status){

        case "Belum":
            return "belum";

        case "Diproses":
            return "diproses";

        case "Disetujui":
            return "disetujui";

        case "Ditolak":
            return "ditolak";

        default:
            return "belum";
    }

}

function changeStatus(select, index){

    const value = select.value;

    window.dataPengaduan[index].status = value;

    select.className = "";

    select.classList.add(
        getStatusClass(value)
    );

}


function renderPagination(){

    pagination.innerHTML = "";

    let totalPages =
        Math.ceil(window.dataPengaduan.length / rowsPerPage);

    if(totalPages === 0){
        totalPages = 1;
    }

  
    const prev = document.createElement("button");

    prev.innerHTML = "‹";

    prev.disabled = currentPage === 1;

    prev.onclick = () => {

        if(currentPage > 1){

            currentPage--;

            renderTable();

        }

    };

    pagination.appendChild(prev);

   
    for(let i = 1; i <= totalPages; i++){

        const btn = document.createElement("button");

        btn.innerText = i;

        if(i === currentPage){
            btn.classList.add("active");
        }

        btn.onclick = () => {

            currentPage = i;

            renderTable();

        };

        pagination.appendChild(btn);

    }

   
    const next = document.createElement("button");

    next.innerHTML = "›";

    next.disabled = currentPage === totalPages;

    next.onclick = () => {

        if(currentPage < totalPages){

            currentPage++;

            renderTable();

        }

    };

    pagination.appendChild(next);

}


const popupHapus =
    document.getElementById("popupHapus");

const btnBatal =
    document.getElementById("btnBatal");

const btnHapus =
    document.getElementById("btnHapus");

btnBatal.addEventListener("click", ()=>{

    popupHapus.style.display = "none";

    selectedIndex = null;

});

btnHapus.addEventListener("click", ()=>{

    if(selectedIndex !== null){

        window.dataPengaduan.splice(selectedIndex,1);

        let totalPages =
            Math.ceil(
                window.dataPengaduan.length / rowsPerPage
            );

        if(totalPages === 0){
            totalPages = 1;
        }

        if(currentPage > totalPages){

            currentPage = totalPages;

        }

        renderTable();

    }

    popupHapus.style.display = "none";

    selectedIndex = null;

});

popupHapus.addEventListener("click",(e)=>{

    if(e.target === popupHapus){

        popupHapus.style.display = "none";

        selectedIndex = null;

    }

});


renderTable();


const logoutPopup =
    document.getElementById("logoutPopup");

function openLogout(){

    logoutPopup.style.display = "flex";

}

function closeLogout(){

    logoutPopup.style.display = "none";

}

function logout(){

    window.location.href =
        "berandabeforelog.php";

}