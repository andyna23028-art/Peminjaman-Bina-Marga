<?php
$currentPage = 'kelolamobil';

$dataMobil = [
    "porsche" => [
        "nama"=>"PORSCHE 911",
        "plat"=>"L 333 NTO",
        "tipe"=>"Sport",
        "tahun"=>"2025",
        "gambar"=>"images/porsche.png",
        "status"=>"Tersedia"
    ],
    "reborn" => [
        "nama"=>"INNOVA REBORN",
        "plat"=>"L 000 GJY",
        "tipe"=>"MPV",
        "tahun"=>"2022",
        "gambar"=>"images/reborn.png",
        "status"=>"Dipinjam"
    ],
    "denza" => [
        "nama"=>"DENZA D9",
        "plat"=>"L 188 BUD",
        "tipe"=>"Electric",
        "tahun"=>"2024",
        "gambar"=>"images/denza.png",
        "status"=>"Tersedia"
    ],
    "camry" => [
        "nama"=>"CAMRY",
        "plat"=>"L 333 NYE",
        "tipe"=>"Sedan",
        "tahun"=>"2021",
        "gambar"=>"images/camry.png",
        "status"=>"Maintenance"
    ],
    "gclass" => [
        "nama"=>"G CLASS",
        "plat"=>"L 123 YRH",
        "tipe"=>"SUV",
        "tahun"=>"2023",
        "gambar"=>"images/gclass.png",
        "status"=>"Tersedia"
    ],
    "ionic" => [
        "nama"=>"IONIC 5",
        "plat"=>"L 111 NTH",
        "tipe"=>"Electric",
        "tahun"=>"2024",
        "gambar"=>"images/ionic.png",
        "status"=>"Tersedia"
    ],
    "zenix" => [
        "nama"=>"ZENIX",
        "plat"=>"L 333 SBI",
        "tipe"=>"Hybrid",
        "tahun"=>"2023",
        "gambar"=>"images/zenix.png",
        "status"=>"Dipinjam"
    ],
    "audi" => [
        "nama"=>"AUDI",
        "plat"=>"L 444 RYY",
        "tipe"=>"Sedan",
        "tahun"=>"2022",
        "gambar"=>"images/audi.png",
        "status"=>"Maintenance"
    ],
    "sclass" => [
        "nama"=>"S CLASS",
        "plat"=>"L 333 KNG",
        "tipe"=>"Luxury",
        "tahun"=>"2023",
        "gambar"=>"images/sclass.png",
        "status"=>"Dipinjam"
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Mobil</title>

<style>
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body {
    background:#f4f4f4;
    display:flex;
}


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

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    font-weight: 600;
    transition: 0.3s;

   
    border: none;
    width: 100%;
    cursor: pointer;
}
.logout:focus {
    outline: none;
}


.logout::before {
    content: "";
    width: 18px;
    height: 18px;
    display: inline-block;
    background: url('images/keluar.png') no-repeat center;
    background-size: contain;
}


.logout:hover {
    background: #d90000;
    transform: translateY(-2px);
}


.top-bar {
    display:flex;
    align-items:center;
    margin-bottom:10px;
}


.btn-tambah {
    background:#ffc400;
    padding:8px 15px;
    border-radius:10px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
}

.btn-tambah img {
    width:18px;
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
    border-radius:25px;
    padding:15px 20px;

    box-shadow:0 5px 12px rgba(0,0,0,0.12);

    display:flex;
    flex-direction:column;

    height:570px;
}


.table-body{
    flex:1;
    overflow:hidden;
}

.pagination{
    display:flex;
    justify-content:center;
    gap:8px;

    margin-top:10px;

    transform:translateY(-18px);
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


.pagination button:first-child:disabled,
.pagination button:last-child:disabled{
    color:#000 !important;
    opacity:1 !important;
}

.header {
    background:#112a6b;
    color:#fff;
    padding:20px;
    border-radius:15px;
    font-size:24px;
    font-weight:bold;
    margin-bottom:20px;
    margin-left:70px; 
}


.card {
    background:#fff;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
}


.btn-tambah {
    background:#ffc400;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    display:inline-flex;
    align-items:center;
    gap:10px;
    cursor:pointer;
    transition:0.2s;
}


.btn-tambah:hover {
    background:#e6b800;
    transform:translateY(-2px);
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}


.btn-tambah:active {
    transform:scale(0.95);
}


table {
    width:100%;
    border-collapse:collapse;
}
th:nth-child(6) {
    text-align: center;
}
th, td {
    padding:13px;
    text-align:left;
}

tr {
    border-top:1px solid #ccc;
}


.mobil-img {
    width:80px;
}
.action {
    display:flex;
    gap:10px;
}


.edit, .delete {
    background:transparent;
    padding:0;
    border-radius:0;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}


.edit img,
.delete img {
    width:25px;
    transition:0.2s;
}


.edit img:hover,
.delete img:hover {
    transform:scale(1.15);
    opacity:0.8;
}


.modal {
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.25);
    justify-content:center;
    align-items:center;
    z-index:99999;
}

.modal-content {
    background:#f2f2f2;
    width:500px; 
    padding:30px;
    border-radius:28px;
    text-align:center;
    z-index:100000;
}


.modal-content h2 {
    font-size:22px;
    color:#1f3c88;
    font-weight:700;
    position:relative;
    display:inline-block;
    margin-bottom:5px;
}


.modal-content h2::before,
.modal-content h2::after {
    content:"";
    position:absolute;
    top:50%;
    width:80px;
    height:2px;
    background:#ccc;
}

.modal-content h2::before {
    right:100%;
    margin-right:15px;
}

.modal-content h2::after {
    left:100%;
    margin-left:15px;
}


.subtitle {
    font-size:12px;
    color:#666;
    margin-bottom:18px;
}


.form {
    display:grid; 
    grid-template-columns:80px 1fr;
    gap:10px 12px;
    margin-bottom:18px;
}

.form label {
    font-size:12px;
}

.form input {
    padding:8px 10px;
    font-size:12px;
    border-radius:8px;
    border:2px solid #f4c400;
}


.form input:focus {
    box-shadow:0 0 0 3px rgba(255,196,0,0.25);
}


.upload-label {
    text-align:left;
    margin-bottom:12px;
    font-weight:500;
}


.upload-box {
    border:2px solid #bbb;
    border-radius:20px;
    padding:12px 10px;
    text-align:center;
    cursor:pointer;
    position:relative;
    transition:0.2s;
}

.upload-box:hover {
    background:#eef3ff;
}


.preview-img {
    display:none;
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:25px;
}


.status-dropdown {
    width:180px;
    position:relative;
    font-weight:600;
    margin-top:5px;
}


.status-selected {
    border:2px solid #333;
    border-radius:12px;
    padding:6px 10px;
    cursor:pointer;
    display:flex;
    justify-content:space-between;
    align-items:center; 
    background:#fff;
    height:36px;
}


.status-selected .arrow {
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    transition:0.3s;
}


.status-selected .arrow.rotate {
    transform:rotate(180deg);
}

.status-selected.tersedia {
    background:#09DB22;
    color:#fff;
    border:none;
}

.status-selected.dipinjam {
    background:#FF0000;
    color:#fff;
    border:none;
}

.status-selected.maintenance {
    background:#071D63;
    color:#fff;
    border:none;
}

.status-options {
    display:none;
    position:absolute;
    width:100%;
    margin-top:5px;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
}


.option {
    padding:5px;
    color:#fff;
    cursor:pointer;
}


.option.tersedia { background:#09DB22; }
.option.dipinjam { background:#FF0000; }
.option.maintenance { background:#071D63; }


.modal-footer {
    display:flex; 
    gap:15px;
    margin-top:100px;
}

.btn-batal {
    flex:1;
    background:#ff1e1e; 
    color:#fff;
    border:none;
    padding:10px;
    font-size:14px;
    border-radius:12px;
    cursor:pointer;
    transition:0.2s;
}

.btn-submit {
    flex:1;
    background:#112a6b; 
    color:#fff;
    border:none;
    padding:10px;
    font-size:14px;
    border-radius:12px;
    cursor:pointer;
    transition:0.2s;
}

.btn-batal:hover {
    background:#d90000;
    transform:translateY(-2px);
}

.btn-submit:hover {
    background:#0b1f4f;
    transform:translateY(-2px);
}


.delete-popup {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.35);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}

.delete-box {
    width: 540px;
    background: #f3f3f3;
    border-radius: 34px;
    padding: 28px 20px 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    animation: popupFade 0.25s ease;
}

.delete-img {
    width: 145px;
    margin-bottom: 8px;
}

.delete-box h2 {
    font-size: 22px;
    font-weight: 700;
    color: #082567;
    margin-bottom: 6px;
}

.delete-box p {
    font-size: 15px;
    color: #3f4c7a;
    line-height: 1.4;
    margin-bottom: 20px;
}

.delete-buttons {
    display: flex;
    gap: 10px;
}

.btn-batal-delete,
.btn-hapus-delete {
    flex: 1;
    border: none;
    padding: 10px;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.btn-batal-delete {
    background: #ff120d;
    color: white;
}

.btn-hapus-delete {
    background: #082567;
    color: white;
}

.btn-batal-delete:hover,
.btn-hapus-delete:hover {
    transform: translateY(-2px);
}

@keyframes popupFade {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.status-cell {
    text-align:center;
}


.status {
    display:inline-block;
    padding:6px 14px;
    border-radius:6px;
    font-size:13px;
    font-weight:600;
    color:#fff; 
    min-width:100px;
    text-align:center;
}


.status.tersedia {
    background:#09DB22;
}


.status.dipinjam {
    background:#FF0000;
}


.status.maintenance {
    background:#071D63;
}
.arrow {
    display:inline-block;
    transition:0.3s;
}


.arrow.rotate {
    transform:rotate(180deg);
}

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
    animation: fadeIn 0.3s ease;
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

.btn-cancel,
.btn-exit {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 600;
}


.btn-cancel {
    background: #e0e0e0;
    color: #071D63;
    transition: all 0.25s ease;
}

.btn-cancel:hover {
    background: #cfcfcf;
    transform: translateY(-2px);
}

.btn-cancel:active {
    transform: scale(0.95);
}


.btn-exit {
    background: #ff2e2e;
    color: white;
    transition: all 0.25s ease;
}

.btn-exit:hover {
    background: #cc0000;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(255,0,0,0.3);
}

.btn-exit:active {
    transform: scale(0.95);
    box-shadow: none;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


.fade-up {
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 0.8s ease forwards;
}

/* DELAY */
.fade-delay-1 { animation-delay: 0.1s; }
.fade-delay-2 { animation-delay: 0.2s; }
.fade-delay-3 { animation-delay: 0.3s; }
.fade-delay-4 { animation-delay: 0.4s; }

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
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
    <a href="peminjamanberjalan.php" class="peminjamanberjalan <?= $currentPage=='peminjaman'?'active':'' ?>">Peminjaman Berjalan</a>
    <a href="laporanpengaduan.php" class="laporanpengaduan <?= $currentPage=='laporan'?'active':'' ?>">Laporan Pengaduan</a>
    <a href="profileadmin.php" class="profileadmin <?= $currentPage=='profile'?'active':'' ?>">Profile</a>
</div>

    <button class="logout" onclick="openLogout()">Keluar</button>
</div>


<div class="content">

   <div class="header fade-up fade-delay-1">KELOLA MOBIL</div>

    <div class="table-wrapper fade-up fade-delay-2">

        <div class="table-body">

            <table>

                <thead>
                <tr>
                    <th>
                        <div class="btn-tambah" id="openModal">
                            <img src="images/tambah.png">
                            Tambah
                        </div>
                    </th>

                    <th>Nama</th>
                    <th>Plat</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>

                <tbody id="tableBody">
                <?php $no=1; foreach($dataMobil as $m): ?>
                <tr class="row-mobil">

                    <td>
                        <?= str_pad($no++,2,'0',STR_PAD_LEFT) ?>.
                        <img src="<?= $m['gambar'] ?>" class="mobil-img">
                    </td>

                    <td><?= $m['nama'] ?></td>
                    <td><?= $m['plat'] ?></td>
                    <td><?= $m['tipe'] ?></td>
                    <td><?= $m['tahun'] ?></td>

                    <td class="status-cell">
                        <span class="status <?= strtolower($m['status']) ?>">
                            <?= $m['status'] ?>
                        </span>
                    </td>

                    <td>
                        <div class="action">
                            <div class="edit">
                                <img src="images/editfile.png">
                            </div>

                            <div class="delete">
                                <img src="images/hapusfile.png">
                            </div>
                        </div>
                    </td>

                </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>

        
        <div class="pagination" id="pagination"></div>

    </div>

</div>


<div class="modal" id="modalForm">
    <div class="modal-content fade-up fade-delay-3">

        <h2>Buat Data Aset</h2>
        <div class="subtitle">
            Masukkan informasi aset baru dengan lengkap dan benar.
        </div>

        <div class="form">
            <label>Nama</label>
            <input type="text">

            <label>Plat</label>
            <input type="text">

            <label>Tipe</label>
            <input type="text">

            <label>Tahun</label>
            <input type="text">
        </div>

        <div class="upload-label">
            Unggah foto untuk aset baru
        </div>

        <div class="upload-box" id="uploadBox">
            <img src="images/unggah.png" class="upload-icon">

            <div>klik untuk mengunggah</div>
            <small>Seret dan lepas berkas disini</small>

            <img id="previewImg" class="preview-img">
            <input type="file" id="fileInput" hidden>
        </div>

        <div class="status-dropdown">
    <div class="status-selected" id="selectedStatus">
        Status
<span class="arrow">⌄</span>
    </div>

    <div class="status-options" id="statusOptions">
        <div class="option tersedia">Tersedia</div>
        <div class="option dipinjam">Dipinjam</div>
        <div class="option maintenance">Maintenance</div>
    </div>
</div>
        <div class="modal-footer">
            <button type="button" class="btn-batal" id="closeModal">
                Batal
            </button>

            <button type="button" class="btn-submit">
                Tambah
            </button>
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
<script src="kelolamobil.js"></script>
</body>
</html>