<?php
$currentPage = 'kelolaruangan';

$dataRuangan = [
    ["nama"=>"R. RAPAT B","lantai"=>"2","kode"=>"B.2.130.115","kapasitas"=>"40 Orang","gambar"=>"images/rapatb.png","status"=>"Tersedia"],
    ["nama"=>"R. RAPAT K","lantai"=>"2","kode"=>"A.2.350.225","kapasitas"=>"15 Orang","gambar"=>"images/rapatk.png","status"=>"Dipinjam"],
    ["nama"=>"R. DISKUSI","lantai"=>"3","kode"=>"B.3.131.116","kapasitas"=>"10 Orang","gambar"=>"images/diskusi.png","status"=>"Dipinjam"],
    ["nama"=>"R. AVI","lantai"=>"1","kode"=>"C.1.339.467","kapasitas"=>"100 Orang","gambar"=>"images/avi.png","status"=>"Tersedia"],
    ["nama"=>"R. WEB","lantai"=>"2","kode"=>"C.2.755.911","kapasitas"=>"50 Orang","gambar"=>"images/web.png","status"=>"Tersedia"],
    ["nama"=>"PANDHAWA","lantai"=>"3","kode"=>"A.3.550.458","kapasitas"=>"350 Orang","gambar"=>"images/pandhawa.png","status"=>"Dipinjam"],
    ["nama"=>"LAP. TENNIS","lantai"=>"1","kode"=>"B.1.120.111","kapasitas"=>"4 Orang","gambar"=>"images/tennis.png","status"=>"Dipinjam"],
    ["nama"=>"LAB","lantai"=>"1","kode"=>"A.1.250.222","kapasitas"=>"10 Orang","gambar"=>"images/lab.png","status"=>"Tersedia"],
    ["nama"=>"AULA","lantai"=>"3","kode"=>"C.3.321.756","kapasitas"=>"300 Orang","gambar"=>"images/aula.png","status"=>"Maintenance"]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Ruangan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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


.btn-cancel {
    flex:1;
    background: #e0e0e0;
    color: #071D63;
    border:none;
    padding:12px;
    border-radius:20px;
    cursor:pointer;
}

.btn-cancel:hover {
    background:#cfcfcf;
    transform:translateY(-2px);
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

.btn-exit:hover {
    background:#cc0000;
    transform:translateY(-2px);
}
.header {
    animation: fadeUpPage 0.7s ease;
}

table {
    animation: fadeUpPage 0.9s ease;
    animation-delay: 0.2s;
    animation-fill-mode: both;
}

.pagination {
    animation: fadeUpPage 1s ease;
    animation-delay: 0.3s;
    animation-fill-mode: both;
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
.row-ruangan {
    opacity: 0;
    transform: translateY(20px);
}

@keyframes fadeUpRow {
    from {
        opacity: 0;
        transform: translateY(25px);
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
        <a href="kelolaruangan.php" class="kelolaruangan active">Kelola Ruangan</a>
        <a href="kelolauser.php" class="kelolauser">Kelola User</a>
        <a href="peminjamanberjalan.php" class="peminjamanberjalan">Peminjaman Berjalan</a>
        <a href="laporanpengaduan.php" class="laporanpengaduan">Laporan Pengaduan</a>
        <a href="profileadmin.php" class="profileadmin">Profile</a>
    </div>

    <button class="logout" onclick="openLogout()">Keluar</button>
</div>


<div class="content">

    <div class="header">KELOLA RUANGAN</div>

    <div class="table-wrapper">

        <div class="table-body">

            <table>

                <thead>
                <tr>
                    <th>
                        <div class="btn-tambah" id="openModal">
                            <img src="images/tambah.png"> Tambah
                        </div>
                    </th>
                    <th>Nama</th>
                    <th>Lantai</th>
                    <th>Kode</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>

                <tbody id="tableBody">
                <?php $no=1; foreach($dataRuangan as $r): ?>
                <tr class="row-ruangan">

                    <td>
                        <?= str_pad($no++,2,'0',STR_PAD_LEFT) ?>.
                        <img src="<?= $r['gambar'] ?>" class="mobil-img">
                    </td>

                    <td><?= $r['nama'] ?></td>
                    <td><?= $r['lantai'] ?></td>
                    <td><?= $r['kode'] ?></td>
                    <td><?= $r['kapasitas'] ?></td>

                    <td class="status-cell">
                        <span class="status <?= strtolower($r['status']) ?>">
                            <?= $r['status'] ?>
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
    <div class="modal-content">

        <h2>Buat Data Aset Ruangan</h2>

        <div class="subtitle">
            Masukkan informasi aset ruangan baru dengan lengkap dan benar.
        </div>

        <div class="form">
            <label>Nama</label>
            <input type="text">

            <label>Lantai</label>
            <input type="text">

            <label>Kode</label>
            <input type="text">

            <label>Kapasitas</label>
            <input type="text">
        </div>

        <div class="upload-label">
            Unggah foto untuk ruangan baru
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

<script src="kelolaruangan.js"></script>


</body>
</html>