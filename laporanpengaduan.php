<?php
include 'koneksi.php';

$currentPage = 'laporanpengaduan';

$query = mysqli_query($conn,"
    SELECT *
    FROM pengaduan
    ORDER BY tanggal DESC
");

$dataPengaduan = [];

while($row = mysqli_fetch_assoc($query)){
    $dataPengaduan[] = [
        "id_pengaduan" => $row['id_pengaduan'],
        "nama" => $row['nama'],
        "nip" => $row['nip'],
        "keluhan" => $row['keluhan'],
        "status" => $row['status']
    ];
}
$currentPage = 'laporanpengaduan';

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Pengaduan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background:#f4f4f4;
    display:flex;
}



.sidebar{
    width:260px;
    height:100vh;
    background:#ffffff;
    padding:28px;
    border-radius:20px;
    margin:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:20px;
}

.logo img{
    width:45px;
}

.logo-text{
    font-size:12px;
    font-weight:600;
    color:#0b2c6a;
}

.menu{
    margin-top:20px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 15px;
    margin-bottom:5px;
    text-decoration:none;
    color:#0b2c6a;
    border-radius:10px;
    font-weight:400;
    position:relative;
}



.menu a::before{
    content:"";
    width:20px;
    height:20px;
    display:inline-block;
    margin-right:8px;
    background-size:contain;
    background-repeat:no-repeat;
}

.menu a.dashboard::before { background-image:url('images/dashboard.png'); }
.menu a.kelolamobil::before { background-image:url('images/kelolamobil.png'); }
.menu a.kelolamotor::before { background-image:url('images/kelolamotor.png'); }
.menu a.kelolaruangan::before { background-image:url('images/kelolaruangan.png'); }
.menu a.kelolauser::before { background-image:url('images/kelolauser.png'); }
.menu a.peminjamanberjalan::before { background-image:url('images/peminjamanberjalan.png'); }
.menu a.laporanpengaduan::before { background-image:url('images/laporanpengaduan.png'); }
.menu a.profileadmin::before { background-image:url('images/profileadmin.png'); }



.menu a.active{
    background:#ffc400;
    font-weight:bold;
}



.menu a:hover{
    background:#A8BDFF;
}



.logout{
    margin-top:30px;
    background:#ff1e1e;
    color:#fff;
    border:none;
    border-radius:10px;
    padding:12px;
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.logout::before{
    content:"";
    width:18px;
    height:18px;
    background:url('images/keluar.png') no-repeat center;
    background-size:contain;
}

.logout:hover{
    background:#d90000;
    transform:translateY(-2px);
}



.content{
    flex:1;
    padding:20px;
}



.header{
    background:#112a6b;
    color:#fff;
    padding:20px 35px;
    border-radius:15px;
    font-size:24px;
    font-weight:bold;
    margin-left:70px;
    margin-bottom:28px;
}



.table-wrapper{
    width:100%;
    background:#efefef;
    border-radius:28px;
    padding:10px;
    overflow:hidden;
    box-shadow:0 5px 12px rgba(0,0,0,0.12);
}


.table-head{
    display:grid;

    grid-template-columns:
        70px
        2fr
        2fr
        3fr
        1.5fr
        120px;

    align-items:center;
    justify-items:center;

    width:100%;

    padding:10px 0;

    border-bottom:2px solid #d0d0d0;
}

.table-head div{
    width:100%;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;

    font-size:17px;
    font-weight:800;
    color:#000;
}


.table-body{
    width:100%;
}


.table-row{
    display:grid;

    grid-template-columns:
        70px
        2fr
        2fr
        3fr
        1.5fr
        120px;

    align-items:center;
    justify-items:center;

    width:100%;

    padding:15px 0;

    border-bottom:1px solid #d5d5d5;
}

.table-row:last-child{
    border-bottom:none;
}

.no,
.nama,
.nip,
.keluhan{
    width:100%;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;

    font-size:15px;
    color:#333;

    line-height:1.5;

    padding:0 10px;
}

.no{
    font-weight:700;
}


.keluhan{
    word-break:break-word;
}


.status{
    width:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    position: relative;
}


.status select{
    width:150px;
    height:44px;

    border:none;
    outline:none;
    border-radius:12px;

    padding:0 40px 0 14px; 

    font-size:14px;
    font-weight:700;
    cursor:pointer;

    color:#fff;
    text-align:center;

    appearance:none;
    -webkit-appearance:none;
    -moz-appearance:none;

    transition:0.2s;

    
    background-image: url("images/dropdown.png");
    background-repeat: no-repeat;
    background-position: right 14px center;
    background-size: 14px;
}


.status::after{
    content: "▼";
    position: absolute;
    right: 22px;
    font-size: 12px;
    color: white;
    pointer-events: none;
}


.status select option{
    background:#fff;
    color:#333;
    font-weight:600;
}


.status select.belum{
    background:#5C5C5C;
}

.status select.diproses{
    background:#071D63;
}

.status select.disetujui{
    background:#09DB22;
}

.status select.ditolak{
    background:#FF0000;
}


.status select:hover{
    transform:translateY(-2px);
    box-shadow:0 4px 10px rgba(0,0,0,0.12);
}


.action{
    width:100%;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;
}

.action img{
    width:28px;
    cursor:pointer;
    transition:0.2s;
}

.action img:hover{
    transform:translateY(-3px) scale(1.05);
}


.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;

    margin-top: auto;  
    padding-top: 20px;

    position: relative;
    bottom: 15px;    
}

.pagination button{
    border:none;
    background:#fff;

    min-width:38px;
    height:38px;

    border-radius:10px;
    cursor:pointer;

    font-weight:700;

    transition:0.2s;

    box-shadow:0 2px 5px rgba(0,0,0,0.08);
}


.pagination button:hover{
    background:#dfe9ff;
    transform:translateY(-2px);
}


.pagination button.active{
    background:#112a6b;
    color:white;
}


.pagination button:first-child,
.pagination button:last-child{
    color:#000 !important;
}


.pagination button:first-child:hover,
.pagination button:last-child:hover{
    color:#000 !important;
}


.pagination button:disabled{
    opacity:0.5;
    cursor:not-allowed;
}


.pagination button:first-child:disabled,
.pagination button:last-child:disabled{
    color:#000 !important;
    opacity:1 !important;
}

.content{
    flex:1;
    padding:20px;
    min-height:100vh;

    display:flex;
    flex-direction:column;
}


.table-wrapper{
    background:#f4f4f4;
    min-height:550px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}


.table-body{
    flex:1;
}


.pagination{
    margin-top:auto;
    padding-top:10px;
}


.popup{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.75);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:99999;
}

.popup-content{
    background:#071D63;
    width:390px;
    padding:35px 30px;
    border-radius:28px;
    text-align:center;
    color:#fff;
}

.popup-content img{
    width:140px;
    margin-bottom:15px;
}

.popup-content p{
    font-size:15px;
    margin-bottom:25px;
}

.btn-group{
    display:flex;
    gap:15px;
}

.btn-cancel,
.btn-exit{
    flex:1;
    border:none;
    padding:12px;
    border-radius:18px;
    font-size:15px;
    cursor:pointer;
}

.btn-cancel{
    background:#e5e5e5;
    color:#071D63;
}

.btn-exit{
    background:#ff2d2d;
    color:#fff;
}
.btn-cancel,
.btn-exit{
    transition:0.2s;
}

.btn-cancel:hover{
    background:#d6d6d6;
    transform:translateY(-2px);
}

.btn-exit:hover{
    background:#d90000;
    transform:translateY(-2px);
}


.popup-hapus{
    position:fixed;
    inset:0;

    background:rgba(0,0,0,0.35);

    display:none;
    justify-content:center;
    align-items:center;

    z-index:999999;
}

.box-hapus{
    background:#f3f3f3;

    width:450px;

    border-radius:30px;

    padding:25px;

    text-align:center;

    animation:fadeIn 0.25s;
}

.box-hapus img{
    width:140px;
    margin-bottom:10px;
}

.box-hapus h3{
    font-size:22px;
    color:#082567;
    margin-bottom:5px;
}

.box-hapus p{
    font-size:14px;
    color:#3f4c7a;
    margin-bottom:20px;
}


.btn-batal{
    flex:1;

    background:#ff120d;
    color:#fff;

    border:none;

    padding:10px;

    border-radius:12px;

    cursor:pointer;

    transition:0.2s;
}

.btn-hapus{
    flex:1;

    background:#082567;
    color:#fff;

    border:none;

    padding:10px;

    border-radius:12px;

    cursor:pointer;

    transition:0.2s;
}

.btn-batal:hover,
.btn-hapus:hover{
    transform:translateY(-2px);
}


@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}


.header{
    animation: fadeUpPage 0.7s ease;
}

.table-wrapper{
    animation: fadeUpPage 0.9s ease;
    animation-delay: 0.2s;
    animation-fill-mode: both;
}

.pagination{
    animation: fadeUpPage 1s ease;
    animation-delay: 0.3s;
    animation-fill-mode: both;
}


.table-row{
    animation: fadeUpPage 0.6s ease;
    animation-fill-mode: both;
}

@keyframes fadeUpPage{
    from{
        opacity: 0;
        transform: translateY(30px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
</head>

<body>


<div class="sidebar">

    <div class="logo">
        <img src="images/logobina.png">

        <div class="logo-text">
            DINAS PEKERJAAN UMUM BINA MARGA<br>
            PROVINSI JAWA TIMUR
        </div>
    </div>

    <div class="menu">

        <a href="dashboard.php" class="dashboard">
            Dashboard
        </a>

        <a href="kelolamobil.php" class="kelolamobil">
            Kelola Mobil
        </a>

        <a href="kelolamotor.php" class="kelolamotor">
            Kelola Motor
        </a>

        <a href="kelolaruangan.php" class="kelolaruangan">
            Kelola Ruangan
        </a>

        <a href="kelolauser.php" class="kelolauser">
            Kelola User
        </a>

        <a href="peminjamanberjalan.php" class="peminjamanberjalan">
            Peminjaman Berjalan
        </a>

        <a href="laporanpengaduan.php" class="laporanpengaduan active">
            Laporan Pengaduan
        </a>

        <a href="profileadmin.php" class="profileadmin">
            Profile
        </a>

    </div>

    <button class="logout" onclick="openLogout()">
        Keluar
    </button>

</div>

<div class="content">

    <div class="header">
        LAPORAN PENGADUAN
    </div>

    <div class="table-wrapper">

        <div class="table-head">
            <div>No</div>
            <div>Nama</div>
            <div>NIP</div>
            <div>Keluhan</div>
            <div>Status</div>
            <div>Aksi</div>
    </div>

        <div class="table-body">

<?php
$no = 1;
foreach($dataPengaduan as $row):
?>

<div class="table-row">

    <div class="no">
        <?= $no++; ?>
    </div>

    <div class="nama">
        <?= htmlspecialchars($row['nama']); ?>
    </div>

    <div class="nip">
        <?= htmlspecialchars($row['nip']); ?>
    </div>

    <div class="keluhan">
        <?= htmlspecialchars($row['keluhan']); ?>
    </div>

    <div class="status">

        <form action="status_pengaduan.php" method="POST">

            <input
                type="hidden"
                name="id_pengaduan"
                value="<?= $row['id_pengaduan']; ?>"
            >

            <select
                name="status"
                onchange="this.form.submit()"
                class="<?= strtolower(str_replace(' ','',$row['status'])) ?>"
            >
                <option value="Belum" <?= $row['status']=='Belum'?'selected':'' ?>>
                    Belum
                </option>

                <option value="Diproses" <?= $row['status']=='Diproses'?'selected':'' ?>>
                    Diproses
                </option>

                <option value="Disetujui" <?= $row['status']=='Disetujui'?'selected':'' ?>>
                    Disetujui
                </option>

                <option value="Ditolak" <?= $row['status']=='Ditolak'?'selected':'' ?>>
                    Ditolak
                </option>

            </select>

        </form>

    </div>

    <div class="action">

        <a href="printpengaduan.php?id=<?= $row['id_pengaduan']; ?>">
            <img src="images/print.png">
        </a>

        <a href="hapus_pengaduan.php"
        class="btn-delete"
        data-id="<?= $row['id_pengaduan']; ?>">
            <img src="images/hapusfile.png">
        </a>

    </div>

</div>

<?php endforeach; ?>

</div>

<div class="pagination" id="pagination"></div>

    </div>

</div>



<div class="popup" id="logoutPopup">

    <div class="popup-content">

        <img src="images/logout.png">

        <p>
            Anda akan keluar dari akun. Lanjutkan?
        </p>

        <div class="btn-group">

            <button class="btn-cancel" onclick="closeLogout()">
                Batal
            </button>

            <button class="btn-exit" onclick="logout()">
                Keluar
            </button>

        </div>

    </div>

</div>

<div class="popup-hapus" id="popupHapus">

    <div class="box-hapus">

        <img src="images/hapus.png">

        <h3>Hapus Pengaduan?</h3>

        <p>
            Data pengaduan akan dihapus permanen dan tidak dapat dikembalikan
        </p>

        <div class="btn-group">

            <button class="btn-batal" id="btnBatal">
                Batal
            </button>

            <button class="btn-hapus" id="btnHapus">
                Hapus
            </button>

        </div>

    </div>

</div>


<script>
/* =========================
   POPUP LOGOUT
========================= */

function openLogout(){
    document.getElementById("logoutPopup").style.display="flex";
}

function closeLogout(){
    document.getElementById("logoutPopup").style.display="none";
}

function logout(){
    window.location.href="loginadmin.php";
}

/* =========================
   POPUP HAPUS
========================= */

let selectedId = null;

const popupHapus = document.getElementById("popupHapus");
const btnHapus = document.getElementById("btnHapus");
const btnBatal = document.getElementById("btnBatal");

document.querySelectorAll(".btn-delete").forEach(btn=>{

    btn.addEventListener("click",function(e){

        e.preventDefault();

        selectedId = this.dataset.id;

        popupHapus.style.display="flex";

    });

});

btnBatal.addEventListener("click",()=>{

    popupHapus.style.display="none";
    selectedId = null;

});

btnHapus.addEventListener("click",()=>{

    if(selectedId){

        window.location.href =
        "hapus_pengaduan.php?id=" + selectedId;

    }

});

/* =========================
   PAGINATION
========================= */

const rows = document.querySelectorAll(".table-row");
const pagination = document.getElementById("pagination");

const rowsPerPage = 5;

let currentPage = 1;

function showPage(page){

    currentPage = page;

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    rows.forEach((row,index)=>{

        row.style.display =
        index >= start && index < end
        ? "grid"
        : "none";

    });

    updatePagination();

}

function updatePagination(){

    pagination.innerHTML = "";

    const totalPages =
    Math.ceil(rows.length / rowsPerPage);
    const prevBtn = document.createElement("button");
    prevBtn.innerHTML = "‹";
    prevBtn.disabled = currentPage === 1;
    prevBtn.onclick = () => showPage(currentPage - 1);
    pagination.appendChild(prevBtn);
    for(let i=1;i<=totalPages;i++){
        const btn =
        document.createElement("button");
        btn.innerText = i;
        if(i===currentPage){
            btn.classList.add("active");
        }
        btn.onclick =
        ()=> showPage(i);
        pagination.appendChild(btn);

    }

    const nextBtn = document.createElement("button");
    nextBtn.innerHTML = "›";
    nextBtn.disabled = currentPage === totalPages;
    nextBtn.onclick = () => showPage(currentPage + 1);
    pagination.appendChild(nextBtn);

}

showPage(1);
</script><script>
/* POPUP LOGOUT*/
function openLogout(){
    document.getElementById("logoutPopup").style.display="flex";
}
function closeLogout(){
    document.getElementById("logoutPopup").style.display="none";
}
function logout(){
    window.location.href="loginadmin.php";
}

/*POPUP HAPUS*/
let selectedId = null;

const popupHapus = document.getElementById("popupHapus");
const btnHapus = document.getElementById("btnHapus");
const btnBatal = document.getElementById("btnBatal");

document.querySelectorAll(".btn-delete").forEach(btn=>{
    btn.addEventListener("click",function(e){
        e.preventDefault();
        selectedId = this.dataset.id;
        popupHapus.style.display="flex";

    });

});
btnBatal.addEventListener("click",()=>{
    popupHapus.style.display="none";
    selectedId = null;
});
btnHapus.addEventListener("click",()=>{
    if(selectedId){
        window.location.href =
        "hapus_pengaduan.php?id=" + selectedId;

    }
});

/*PAGINATION*/
const rows = document.querySelectorAll(".table-row");
const pagination = document.getElementById("pagination");
const rowsPerPage = 5;
let currentPage = 1;
function showPage(page){
    currentPage = page;
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    rows.forEach((row,index)=>{
        row.style.display =
        index >= start && index < end
        ? "grid"
        : "none";
    });
    updatePagination();
}

function updatePagination(){

    pagination.innerHTML = "";

    const totalPages =
    Math.ceil(rows.length / rowsPerPage);

    const prevBtn =
    document.createElement("button");

    prevBtn.innerHTML = "&laquo;";

    prevBtn.disabled =
    currentPage === 1;

    prevBtn.onclick =
    ()=> showPage(currentPage - 1);

    pagination.appendChild(prevBtn);

    for(let i=1;i<=totalPages;i++){

        const btn =
        document.createElement("button");

        btn.innerText = i;

        if(i===currentPage){
            btn.classList.add("active");
        }

        btn.onclick =
        ()=> showPage(i);

        pagination.appendChild(btn);

    }

    const nextBtn =
    document.createElement("button");

    nextBtn.innerHTML = "&raquo;";

    nextBtn.disabled =
    currentPage === totalPages;

    nextBtn.onclick =
    ()=> showPage(currentPage + 1);

    pagination.appendChild(nextBtn);

}

showPage(1);
</script>
</body>
</html>