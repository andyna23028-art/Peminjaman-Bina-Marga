let dateStart = new Date();
let dateEnd = new Date();

let tanggalMulaiDipilih = "";
let tanggalSelesaiDipilih = "";

const monthNames = [
    "Januari","Februari","Maret","April",
    "Mei","Juni","Juli","Agustus",
    "September","Oktober","November","Desember"
];

// =====================
// MODAL
// =====================

function toggleModal(show){

    const overlay =
    document.getElementById("overlay");

    if(!overlay) return;

    overlay.classList.toggle("active", show);

    document.body.style.overflow =
    show ? "hidden" : "auto";

    if(show){

        renderCalendar("start", dateStart);
        renderCalendar("end", dateEnd);

    }
}

// =====================
// CALENDAR
// =====================

function renderCalendar(type, dateObj){

    const container =
    document.querySelector(`#cal-${type}`);

    if(!container) return;

    const grid =
    container.querySelector(".cal-dates");

    const monthLabel =
    container.querySelector(".month-name");

    const year =
    dateObj.getFullYear();

    const month =
    dateObj.getMonth();

    monthLabel.innerText =
    `${monthNames[month]} ${year}`;

    grid.innerHTML = "";

    const firstDay =
    new Date(year, month, 1).getDay();

    const lastDate =
    new Date(year, month + 1, 0).getDate();

    for(let i=0;i<firstDay;i++){

        let div =
        document.createElement("div");

        div.className = "empty";

        grid.appendChild(div);
    }

    for(let d=1; d<=lastDate; d++){

        let div =
        document.createElement("div");

        div.innerText = d;

        div.onclick = function(){

            container
            .querySelectorAll(".cal-dates div")
            .forEach(el =>
                el.classList.remove("selected")
            );

            div.classList.add("selected");

            let hari =
            String(d).padStart(2,"0");

            let bulan =
            String(month+1).padStart(2,"0");

            let tanggal =
            `${year}-${bulan}-${hari}`;

            if(type==="start"){

                tanggalMulaiDipilih =
                tanggal;

                document.getElementById(
                    "tanggalMulai"
                ).value = tanggal;

            }else{

                tanggalSelesaiDipilih =
                tanggal;

                document.getElementById(
                    "tanggalSelesai"
                ).value = tanggal;
            }

        };

        grid.appendChild(div);
    }
}

// =====================
// GANTI BULAN
// =====================

function changeMonth(type,val){

    if(type==="start"){

        dateStart.setMonth(
            dateStart.getMonth()+val
        );

        renderCalendar(
            "start",
            dateStart
        );

    }else{

        dateEnd.setMonth(
            dateEnd.getMonth()+val
        );

        renderCalendar(
            "end",
            dateEnd
        );
    }
}

// =====================
// STATUS ASET
// =====================

function handleAction(status){

    status =
    status.toLowerCase();

    if(status==="tersedia"){

        toggleModal(true);

    }else if(status==="dipinjam"){

        document
        .getElementById("popupDipinjam")
        .classList.add("active");

    }else if(status==="maintenance"){

        document
        .getElementById("maintenancePopup")
        .classList.add("active");
    }
}

// =====================
// CLOSE POPUP
// =====================

function closeDipinjam(){

    document
    .getElementById("popupDipinjam")
    .classList.remove("active");
}

function closeMaintenance(){

    document
    .getElementById("maintenancePopup")
    .classList.remove("active");
}

// =====================
// KLIK AREA GELAP
// =====================

window.onclick = function(event){

    const overlay =
    document.getElementById("overlay");

    const dipinjam =
    document.getElementById("popupDipinjam");

    const maintenance =
    document.getElementById("maintenancePopup");

    if(event.target === overlay){

        toggleModal(false);
    }

    if(event.target === dipinjam){

        closeDipinjam();
    }

    if(event.target === maintenance){

        closeMaintenance();
    }
};

// =====================
// VALIDASI FORM
// =====================

document.addEventListener(
"DOMContentLoaded",
function(){

    const form =
    document.querySelector(
        '#overlay form'
    );

    if(form){

        form.addEventListener(
        "submit",
        function(e){

            const tglMulai =
            document.getElementById(
                "tanggalMulai"
            ).value;

            const tglSelesai =
            document.getElementById(
                "tanggalSelesai"
            ).value;

            if(
                tglMulai === "" ||
                tglSelesai === ""
            ){

                alert(
                    "Pilih tanggal mulai dan tanggal selesai terlebih dahulu"
                );

                e.preventDefault();

                return;
            }

            if(
                tglSelesai <
                tglMulai
            ){

                alert(
                    "Tanggal selesai tidak boleh lebih kecil dari tanggal mulai"
                );

                e.preventDefault();

                return;
            }
        });
    }

});