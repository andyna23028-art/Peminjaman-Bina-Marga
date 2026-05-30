<?php
$currentPage = 'peminjamanberjalan';


$data = [

    "motor" => [
        ["nama"=>"HONDA SUPRA 125","plat"=>"L 276 TYN","tipe"=>"Bebek","tahun"=>"2020","gambar"=>"images/supra.png"],
        ["nama"=>"HONDA VARIO 120","plat"=>"L 736 NDU","tipe"=>"Matic","tahun"=>"2019","gambar"=>"images/vario.png"],
        ["nama"=>"YAMAHA NMAX","plat"=>"L 191 BNA","tipe"=>"Matic","tahun"=>"2025","gambar"=>"images/nmax.png"],
        ["nama"=>"HONDA PCX 160","plat"=>"L 837 NHD","tipe"=>"Matic","tahun"=>"2025","gambar"=>"images/pcx.png"],
        ["nama"=>"HONDA BEAT ESP","plat"=>"L 837 KSD","tipe"=>"Matic","tahun"=>"2025","gambar"=>"images/beat.png"],
        ["nama"=>"HONDA SCOOPY","plat"=>"L 326 KSJ","tipe"=>"Matic","tahun"=>"2025","gambar"=>"images/scoopy.png"],
        ["nama"=>"HONDA VERZA","plat"=>"L 539 YDB","tipe"=>"Sport","tahun"=>"2025","gambar"=>"images/verza.png"],
        ["nama"=>"HONDA CB150R","plat"=>"L 736 NXU","tipe"=>"Sport","tahun"=>"2025","gambar"=>"images/cb150r.png"],
        ["nama"=>"YAMAHA VIXION","plat"=>"L 983 NMJ","tipe"=>"Sport","tahun"=>"2025","gambar"=>"images/vixion.png"]
    ],
"mobil" => array_values([
        ["nama"=>"PORSCHE 911","plat"=>"L 333 NTO","tipe"=>"Sport","tahun"=>"2025","gambar"=>"images/porsche.png"],
        ["nama"=>"INNOVA REBORN","plat"=>"L 000 GJY","tipe"=>"MPV","tahun"=>"2022","gambar"=>"images/reborn.png"],
        ["nama"=>"DENZA D9","plat"=>"L 188 BUD","tipe"=>"Electric","tahun"=>"2024","gambar"=>"images/denza.png"],
        ["nama"=>"CAMRY","plat"=>"L 333 NYE","tipe"=>"Sedan","tahun"=>"2021","gambar"=>"images/camry.png"],
        ["nama"=>"G CLASS","plat"=>"L 123 YRH","tipe"=>"SUV","tahun"=>"2023","gambar"=>"images/gclass.png"],
        ["nama"=>"IONIC 5","plat"=>"L 111 NTH","tipe"=>"Electric","tahun"=>"2024","gambar"=>"images/ionic.png"],
        ["nama"=>"ZENIX","plat"=>"L 333 SBI","tipe"=>"Hybrid","tahun"=>"2023","gambar"=>"images/zenix.png"],
        ["nama"=>"AUDI","plat"=>"L 444 RYY","tipe"=>"Sedan","tahun"=>"2022","gambar"=>"images/audi.png"],
        ["nama"=>"S CLASS","plat"=>"L 333 KNG","tipe"=>"Luxury","tahun"=>"2023","gambar"=>"images/sclass.png"]
    ]),
 "ruangan" => [
        ["nama"=>"R. RAPAT B","plat"=>"Lt.2","tipe"=>"B.2.130.115","tahun"=>"40 Orang","gambar"=>"images/rapatb.png"],
        ["nama"=>"R. RAPAT K","plat"=>"Lt.2","tipe"=>"A.2.350.225","tahun"=>"15 Orang","gambar"=>"images/rapatk.png"],
        ["nama"=>"R. DISKUSI","plat"=>"Lt.3","tipe"=>"B.3.131.116","tahun"=>"10 Orang","gambar"=>"images/diskusi.png"],
        ["nama"=>"R. AVI","plat"=>"Lt.1","tipe"=>"C.1.339.467","tahun"=>"100 Orang","gambar"=>"images/avi.png"],
        ["nama"=>"R. WEB","plat"=>"Lt.2","tipe"=>"C.2.755.911","tahun"=>"50 Orang","gambar"=>"images/web.png"],
        ["nama"=>"PANDHAWA","plat"=>"Lt.3","tipe"=>"A.3.550.458","tahun"=>"350 Orang","gambar"=>"images/pandhawa.png"],
        ["nama"=>"LAP. TENNIS","plat"=>"Lt.1","tipe"=>"B.1.120.111","tahun"=>"4 Orang","gambar"=>"images/tennis.png"],
        ["nama"=>"LAB","plat"=>"Lt.1","tipe"=>"A.1.250.222","tahun"=>"10 Orang","gambar"=>"images/lab.png"],
        ["nama"=>"AULA","plat"=>"Lt.3","tipe"=>"C.3.321.756","tahun"=>"300 Orang","gambar"=>"images/aula.png"]
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman Berjalan</title>

<style>

* {margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI', sans-serif;}
body {background:#f4f4f4;display:flex;}

.sidebar {
    width:260px;
    height:100vh;
    background:#ffffff;
    padding:28px;
    border-radius:20px;
    margin:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
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
    background:#ffc400;
    font-weight:bold;
}


.menu a:hover {
    background:#A8BDFF;
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

    display:flex;
    flex-direction:column;
    min-height:100vh;
}

.header {
    background:#112a6b;color:#fff;
    padding:20px;border-radius:15px;
    font-size:24px;font-weight:bold;
    margin-left:70px;margin-bottom:20px;
}


.table-head, .row {
    display:grid;
    grid-template-columns: 
        50px
        80px
        1.5fr
        1.5fr
        2fr
        1fr
        100px;
}

.table-head div {
    padding:12px;text-align:center;font-weight:600;
}

.row div {
    padding:12px;text-align:center;
    border-top:1px solid #ddd;
}

.table-container{
    background:#f4f4f4;
    height:500px;

    display:flex;
    flex-direction:column;

    border-radius:28px;
    padding:15px 25px;

    box-shadow:0 5px 12px rgba(0,0,0,0.12);
}


#tableBody{
    flex:1;
    overflow:hidden;
}


.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;

    margin-top: auto;  
    padding-top: 20px;

    position: relative;
    bottom: 25px;    
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
    transition: all 0.3s ease;
}
.tab:hover {
    background: #FFFFF;
    transform: translateY(-3px); /* naik dikit */
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
.tab.active {
    background: #112a6b;
    color: white;
    transform: scale(1.02);
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}
.table-head, .row {
    display:grid;
    grid-template-columns: 
        50px
        80px
        1.5fr
        1.5fr
        2fr
        1fr
        120px   
        100px;  
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


.status-badge.Diproses {
    background: #071D63;
    color: white;
}


.status-badge.Diterima {
    background: #09DB22;
    color: white;
}


.status-badge.Ditolak {
    background: #FF0000;
    color: white;
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
        <a href="dashboard.php" class="dashboard">Dashboard</a>
        <a href="kelolamobil.php" class="kelolamobil">Kelola Mobil</a>
        <a href="kelolamotor.php" class="kelolamotor">Kelola Motor</a>
        <a href="kelolaruangan.php" class="kelolaruangan">Kelola Ruangan</a>
        <a href="kelolauser.php" class="kelolauser">Kelola User</a>
        <a href="peminjamanberjalan.php" class="peminjamanberjalan active">Peminjaman Berjalan</a>
        <a href="laporanpengaduan.php" class="laporanpengaduan">Laporan Pengaduan</a>
        <a href="profileadmin.php" class="profileadmin">Profile</a>
    </div>

    <button class="logout" onclick="openLogout()">Keluar</button>
</div>


<div class="content">

<div class="header">PEMINJAMAN BERJALAN</div>
<div class="tab-container">
    <button class="tab active" data-tab="mobil">Mobil</button>
    <button class="tab" data-tab="motor">Motor</button>
    <button class="tab" data-tab="ruangan">Ruangan</button>
</div>

<div class="table-container">

   <div class="table-head">

    <div>No</div>

    <div></div>

    <div>Nama</div>

    <div>Plat</div>

    <div>Tipe</div>

    <div>Tahun</div>

    <div>Status</div>

    <div></div>

</div>
    <div id="tableBody"></div>

    <div class="pagination" id="pagination"></div>

</div>
<script>
    window.peminjamanData = <?php echo json_encode($data); ?>;
</script>

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

<script src="peminjamanberjalan.js"></script>

</body>
</html>