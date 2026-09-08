<?php
$currentPage = 'peminjamanberjalan';
include 'koneksi.php';
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'Mobil';
$query = mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE jenis_aset='$filter'
ORDER BY
CASE
    WHEN status_pengajuan='Diproses' THEN 1
    WHEN status_pengajuan='Dikembalikan' THEN 2
    WHEN status_pengajuan='Disetujui' THEN 3
    WHEN status_pengajuan='Ditolak' THEN 4
    WHEN status_pengajuan='Dibatalkan' THEN 5
    ELSE 6
END,
id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman Berjalan</title>

<style>

* {margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI', sans-serif;}
body{
    background:#f4f4f4;
    display:flex;
    overflow-x:hidden;
}
.sidebar{
    width:260px;
    min-width:260px;
    height:calc(100vh - 30px);
    background:#fff;
    padding:28px;
    border-radius:20px;
    margin:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    flex-shrink:0;
}

.logo {
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:20px;
}

.logo img {
    width:45px;
}

.logo-text {
    font-size:12px;
    font-weight:600;
    color:#0b2c6a;
}

.menu {
    margin-top:20px;
}

.menu a {
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



.menu a::before {
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



.menu a.active {
    background: #ffc400;
    color: #000;
    font-weight: bold;
}


.menu a:hover {
    background: #A8BDFF;
    color: #0b2c6a;
}


.logout {
    margin-top: 30px;
    background: #ff1e1e;
    color: #fff;
    text-decoration: none;
    border-radius: 10px;

    padding: 12px;
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    font-weight: 600;
    cursor: pointer;
    border: none;

    transition: 0.3s;
}


.logout::before {
    content: "";
    width: 18px;
    height: 18px;
    background: url('images/keluar.png') no-repeat center;
    background-size: contain;
}


.logout:hover {
    background: #d90000;
    transform: translateY(-2px);
}

.content{
    flex:1;
    padding:20px;
    min-width:0;
    overflow:hidden;
}

.header{
    background:#112a6b;
    color:white;
    padding:20px;
    border-radius:15px;
    font-size:24px;
    font-weight:bold;

    margin-left:70px;
    margin-bottom:20px;
}


/* Mobil & Motor */
/* Mobil & Motor */
.table-head,
.row{
    display:grid;
    grid-template-columns:
        50px
        1.2fr
        1.5fr
        0.9fr
        1fr
        0.8fr
        1.4fr
        0.8fr
        1fr
        0.9fr;

    align-items:center;
}

/* Ruangan */
.table-head.ruangan,
.row.ruangan{
    display:grid;
    grid-template-columns:
        50px
        1.2fr
        1.5fr
        0.9fr
        1fr
        1.4fr
        0.8fr
        1fr
        0.9fr;

    align-items:center;
}

.table-head div,
.row div{
    padding:8px 5px;
    font-size:14px;
}

.row {
    border-top:1px solid #ddd;
}

/* BIKIN ISI SEMUA KOLOM TENGAH */
.row > div{
    display:flex;
    justify-content:center;
    align-items:center;
}

/* KHUSUS STATUS */
.row > div:nth-child(9){
    justify-content:center !important;
}

.status-badge{
    display:inline-flex;

    justify-content:center;
    align-items:center;

    min-width:100px;

    margin:auto;

    padding:7px 14px;

    border-radius:20px;
}
.aksi{
    display:flex;
    justify-content:center;
    gap:6px;
    min-width:70px;
}

.table-scroll{
    width:100%;
    overflow-x:auto;
    overflow-y:hidden;
}

.table-container{
    width:100%;
    max-width:100%;

    background:#fff;
    border-radius:20px;
    padding:20px;

    box-shadow:0 4px 8px rgba(0,0,0,0.1);

    display:flex;
    flex-direction:column;
    min-height:490px;
}

#tableBody{
    flex:1;
    display:flex;
    flex-direction:column;
}

.pagination {
    display:flex;
    justify-content:center;
    gap:8px;

    margin-top:auto;
    padding-top:20px;
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


.status {
    display:flex;
    justify-content:center;
    gap:10px;
}

.btn-x, .btn-check {
    width:30px;height:30px;
    border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    color:#fff;cursor:pointer;
}

.btn-x {background:red;}
.btn-check {background:#4cd964;}

.popup {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.75);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}

.popup-content {
    background: #071D63;
    padding: 35px 30px;
    border-radius: 25px;
    width: 380px;
    text-align: center;
    color: white;
}

.popup-content img {
    width: 140px;
    margin-bottom: 10px;
}

.popup-content p {
    margin-bottom: 25px;
    font-size: 15px;
}

.btn-group {
    display: flex;
    gap: 15px;
}

.btn-cancel {
    flex:1;
    background: #e0e0e0;
    color: #071D63;
    border:none;
    padding:12px;
    border-radius:20px;
    cursor:pointer;
}

.btn-exit {
    flex:1;
    background:#ff2e2e;
    color:white;
    border:none;
    padding:12px;
    border-radius:20px;
    cursor:pointer;
}
.btn-cancel:hover {
    background:#cfcfcf;
    transform: translateY(-2px);
    transition:0.2s;
}

.btn-exit:hover {
    background:#cc0000;
    transform: translateY(-2px);
    transition:0.2s;
}
.tab-container {
    display: flex;
    width: 100%;
    gap: 15px;
    margin: 20px 0;
}

.tab {
    flex: 1;
    padding: 12px 0;
    border-radius: 12px;
    border: 2px solid #112a6b;
    background: white;
    color: #112a6b;
    cursor: pointer;
    font-weight: 600;
    text-align: center;
    text-decoration: none; /* HILANGKAN GARIS BAWAH */
    transition: all 0.3s ease;
}
.tab:hover {
    background: #ffffff;
    transform: translateY(-3px); /* naik dikit */
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
.tab.active {
    background: #112a6b;
    color: white;
    transform: scale(1.02);
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.status {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.status-text {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    text-align: center;
    min-width: 90px;
}
.status-box {
   
    border-radius: 12px;
    padding: 6px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.status-badge {
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
}


.status-badge.Diproses{
    background:#071D63;
    color:white;
}

.status-badge.Disetujui{
    background:#09DB22;
    color:white;
}

.status-badge.Ditolak{
    background:#FF0000;
    color:white;
}

.status-badge.Dibatalkan{
    background:#808080;
    color:white;
}

.status-badge.Dikembalikan{
    background:#FFA500;
    color:white;
}
.status-box {
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.status-badge {
    transition: 0.2s;
}

.status-badge:hover {
    transform: scale(1.05);
}

.aksi {
    display: flex;
    gap: 8px;
}

.aksi img {
    width: 30px;
    height: 30px;      
    object-fit: contain; 
    cursor: pointer;
    transition: 0.2s;
}
.btn-tolak {
    background: #ffe5e5;
}

.btn-terima {
    background: #e6f9ec;
}
.aksi img:hover {
    transform: scale(1.2);
}

.btn-tolak, .btn-terima {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    cursor: pointer;
}

.btn-tolak img,
.btn-terima img {
    width: 22px;
    pointer-events: none; 
}

.popup-konfirmasi,
.popup-tolak {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999999;
}

.popup-box {
    width: 740px;
    background: #efefef;
    border-radius: 28px;
    padding: 28px 35px 35px;
    animation: popupMuncul 0.2s ease;
}

@keyframes popupMuncul{
    from{
        transform: scale(0.9);
        opacity:0;
    }
    to{
        transform: scale(1);
        opacity:1;
    }
}

.popup-title {
    text-align: center;
    font-size: 28px;
    font-weight: 800;
    color: #0b2465;
    margin-bottom: 4px;
}

.popup-subtitle {
    text-align: center;
    color: #333;
    font-size: 18px;
    margin-bottom: 35px;
}


.alasan-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 45px 90px;
    margin-bottom: 35px;
    padding: 0 20px;
}

.alasan-item {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 20px;
    color: #0b2465;
    cursor: pointer;
    font-weight: 500;
}

.alasan-item input[type="radio"]{
    appearance:none;
    width: 18px;
    height: 18px;
    border: 4px solid #0b2465;
    border-radius: 50%;
    background: white;
    cursor: pointer;
    position: relative;
}

.alasan-item input[type="radio"]:checked::before{
    content:"";
    width:8px;
    height:8px;
    border-radius:50%;
    background:#0b2465;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

.popup-btn-group {
    display: flex;
    justify-content: space-between;
    gap: 30px;
}

.btn-popup-batal,
.btn-popup-konfirmasi {
    flex:1;
    border:none;
    height: 48px;
    border-radius: 12px;
    font-size: 20px;
    font-weight: 700;
    color: white;
    cursor: pointer;
    transition: 0.2s;
}

.btn-popup-batal {
    background: #ff0d0d;
}

.btn-popup-konfirmasi {
    background: #071d63;
}

.btn-popup-batal:hover,
.btn-popup-konfirmasi:hover{
    transform: translateY(-2px);
}

.btn-tolak,
.btn-terima{
    transition: 0.25s ease;
}

.btn-tolak:hover,
.btn-terima:hover{
    transform: translateY(-3px) scale(1.08);
}

.btn-tolak img,
.btn-terima img{
    transition: 0.25s ease;
}

.btn-tolak:hover img{
    filter: drop-shadow(0 4px 8px rgba(255,0,0,0.35));
}

.btn-terima:hover img{
    filter: drop-shadow(0 4px 8px rgba(0,255,100,0.35));
}

.table-head > div{
    display:flex;
    align-items:center;
    justify-content:center;
}


.table-head > div:first-child{
    justify-content:flex-start;
}

.table-head{
    overflow: visible;
}

.pagination button:first-child,
.pagination button:last-child{
    color:#000 !important;
}


.pagination button:first-child:hover,
.pagination button:last-child:hover{
    color:#000 !important;
}


.pagination button:first-child:disabled,
.pagination button:last-child:disabled{
    color:#000 !important;
    opacity:1 !important;
}

.header {
    animation: fadeUpPage 0.7s ease;
}


.tab-container {
    animation: fadeUpPage 0.8s ease;
    animation-delay: 0.1s;
    animation-fill-mode: both;
}


.table-container {
    animation: fadeUpPage 0.9s ease;
    animation-delay: 0.2s;
    animation-fill-mode: both;
}


.pagination {
    animation: fadeUpPage 1s ease;
    animation-delay: 0.3s;
    animation-fill-mode: both;
}


#tableBody.fade-up {
    animation: fadeUpPage 0.5s ease;
}

.pagination-click {
    animation: fadeUpPage 0.5s ease;
}


.popup-content,
.popup-box {
    animation: fadeUpPage 0.4s ease;
}


@keyframes fadeUpPage {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
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
        <a href="dashboard.php" class="dashboard <?= $currentPage=='dashboard'?'active':'' ?>">Dashboard</a>

<a href="kelolamobil.php" class="kelolamobil <?= $currentPage=='kelolamobil'?'active':'' ?>">Kelola Mobil</a>

<a href="kelolamotor.php" class="kelolamotor <?= $currentPage=='kelolamotor'?'active':'' ?>">Kelola Motor</a>

<a href="kelolaruangan.php" class="kelolaruangan <?= $currentPage=='kelolaruangan'?'active':'' ?>">Kelola Ruangan</a>

<a href="kelolauser.php" class="kelolauser <?= $currentPage=='kelolauser'?'active':'' ?>">Kelola User</a>

<a href="peminjamanberjalan.php" class="peminjamanberjalan <?= $currentPage=='peminjamanberjalan'?'active':'' ?>">Peminjaman Berjalan</a>

<a href="laporanpengaduan.php" class="laporanpengaduan <?= $currentPage=='laporanpengaduan'?'active':'' ?>">Laporan Pengaduan</a>

<a href="profileadmin.php" class="profileadmin <?= $currentPage=='profileadmin'?'active':'' ?>">Profile</a>
    </div>

    <button class="logout" onclick="openLogout()">Keluar</button>
</div>


<div class="content">

    <div class="header">PEMINJAMAN BERJALAN</div>
    <div class="tab-container">
        <a href="?filter=Mobil"
        class="tab <?= $filter=='Mobil'?'active':'' ?>">
        Mobil
        </a>

        <a href="?filter=Motor"
        class="tab <?= $filter=='Motor'?'active':'' ?>">
        Motor
        </a>

        <a href="?filter=Ruangan"
        class="tab <?= $filter=='Ruangan'?'active':'' ?>">
        Ruangan
        </a>
    </div>

    <div class="table-container">

        <div class="table-head <?= $filter=='Ruangan' ? 'ruangan' : '' ?>">

            <div>No</div>
            <div>Username</div>
            <div>Nama Aset</div>
            <div>Jenis Aset</div>
            <div>Plat/Kode</div>
            <?php if($filter != 'Ruangan'): ?>
                <div>Tipe</div>
            <?php endif; ?>
            <div>Tanggal</div>
            <div>Jam</div>
            <div>Status</div>
            <div>Aksi</div>

        </div>
        <div id="tableBody">
            <?php
                $no = 1;

                while($row = mysqli_fetch_assoc($query)){
                ?>

                <div class="row <?= $filter=='Ruangan' ? 'ruangan' : '' ?>">

                    <div><?= $no++ ?></div>

                    <div><?= $row['username'] ?></div>

                    <div><?= $row['nama'] ?></div>

                    <div><?= $row['jenis_aset'] ?></div>

                    <div>
                        <?= !empty($row['plat']) ? $row['plat'] : $row['kode'] ?>
                    </div>

                    <?php if($filter != 'Ruangan'): ?>
                        <div>
                            <?= $row['tipe'] ?? '-' ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <?= $row['tanggal_mulai'] ?>
                        <br>
                        s/d
                        <br>
                        <?= $row['tanggal_selesai'] ?>
                    </div>

                    <div><?= $row['jam_mulai'] ?></div>

                    <div>
                        <span class="status-badge <?= $row['status_pengajuan'] ?>">
                            <?= $row['status_pengajuan'] ?>
                        </span>
                    </div>

                    <div class="aksi">

                        <?php if($row['status_pengajuan']=='Diproses'): ?>

                            <a href="#"
                            onclick="openPopupTolak(<?= $row['id_peminjaman'] ?>); return false;">
                                <div class="btn-tolak">
                                    <img src="images/tolak.png">
                                </div>
                            </a>

                            <a href="#"
                            onclick="openPopupSetuju(<?= $row['id_peminjaman'] ?>); return false;">
                                <div class="btn-terima">
                                    <img src="images/terima.png">
                                </div>
                            </a>

                        <?php else: ?>

                            

                        <?php endif; ?>

                    </div>

                </div>

            <?php } ?>
        </div>
        <div class="pagination" id="pagination"></div>
    </div>
</div>

</div>

<div class="popup" id="logoutPopup">
    <div class="popup-content">
        <img src="images/logout.png"><br><br>
        <p>Anda akan keluar dari akun. Lanjutkan?</p>

        <div class="btn-group">
            <button class="btn-cancel" onclick="closeLogout()">Batal</button>
            <button class="btn-exit" onclick="logout()">Keluar</button>
        </div>
    </div>
</div>

<div class="popup-tolak" id="popupTolak">
    <div class="popup-box">

        <div class="popup-title">Detail Penolakan</div>
        <div class="popup-subtitle">
            Pilih 1 alasan penolakan pengajuan
        </div>

        <div class="alasan-grid">

            <label class="alasan-item">
                <input type="radio" name="alasan">
                Dalam perawatan
            </label>

            <label class="alasan-item">
                <input type="radio" name="alasan">
                Pengurusan Surat
            </label>

            <label class="alasan-item">
                <input type="radio" name="alasan">
                Pengajuan Melebihi Kuota
            </label>

            <label class="alasan-item">
                <input type="radio" name="alasan">
                Pengajuan diluar Jadwal
            </label>

        </div>

        <div class="popup-btn-group">
            <button class="btn-popup-batal" onclick="closePopupTolak()">
                Batal
            </button>

            <button class="btn-popup-konfirmasi" onclick="konfirmasiTolak()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="popup-konfirmasi" id="popupSetuju">
    <div class="popup-box" style="width:740px;">

        <div class="popup-title">
            Konfirmasi Persetujuan
        </div>

        <div class="popup-subtitle" style="margin-bottom:35px;">
            Apakah Anda yakin ingin menyetujui pengajuan ini?
        </div>

        <div class="popup-btn-group">

            <button class="btn-popup-batal" onclick="closePopupSetuju()">
                Batal
            </button>

            <button class="btn-popup-konfirmasi" onclick="konfirmasiSetuju()">
                Konfirmasi
            </button>

        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

    const rows = document.querySelectorAll("#tableBody .row");
    const pagination = document.getElementById("pagination");

    let currentPage = 1;
    const rowsPerPage = 4;

    function showPage(page) {

        const totalPages = Math.max(
            1,
            Math.ceil(rows.length / rowsPerPage)
        );

        if (page < 1) page = 1;
        if (page > totalPages) page = totalPages;

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

        const totalPages = Math.max(
            1,
            Math.ceil(rows.length / rowsPerPage)
        );

        // Tombol Previous
        const prev = document.createElement("button");
        prev.innerHTML = "‹";
        prev.disabled = currentPage === 1;

        prev.onclick = function () {
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        };

        pagination.appendChild(prev);

        // Nomor halaman
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

        // Tombol Next
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

function openPopupTolak(id) {
    selectedId = id;
    document.getElementById("popupTolak").style.display = "flex";
}

function closePopupTolak() {
  document.getElementById("popupTolak").style.display = "none";
}

function konfirmasiTolak() {

const alasan = document.querySelector(
'input[name="alasan"]:checked'
);

if(!alasan){

    alert("Pilih alasan penolakan");
    return;

}

fetch("tolak_peminjaman.php",{
    method:"POST",
    headers:{
        "Content-Type":"application/x-www-form-urlencoded"
    },
    body:
    "id_peminjaman="+selectedId+
    "&alasan="+encodeURIComponent(alasan.parentElement.innerText)
})
.then(res=>res.text())
.then(data=>{

    alert("Pengajuan ditolak");

    location.reload();

});

  closePopupTolak();
}

// ======================
// POPUP SETUJU
// ======================

function openPopupSetuju(id) {
    selectedId = id;
    document.getElementById("popupSetuju").style.display = "flex";
}

function closePopupSetuju() {
  document.getElementById("popupSetuju").style.display = "none";
}

function konfirmasiSetuju() {

fetch("setujui_peminjaman.php",{
    method:"POST",
    headers:{
        "Content-Type":"application/x-www-form-urlencoded"
    },
    body:"id_peminjaman="+selectedId
})
.then(res=>res.text())
.then(data=>{

    alert("Peminjaman disetujui");

    location.reload();

});

}
</script>

</body>
</html>