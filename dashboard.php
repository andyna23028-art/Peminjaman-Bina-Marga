<?php
session_start();

if(!isset($_SESSION['admin'])){
    header('Location: login.php');
}
$currentPage = 'dashboard';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
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
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-weight: 600;
    transition: 0.3s;
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

.content {
    flex:1;
    padding:20px;
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

.cards {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
    margin-bottom:10px;
}

.card {
    background:#ddd;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    position:relative;
}

.card.yellow {
    background:linear-gradient(135deg,#e6c34a,#c9a93d);
    color:#fff;
}

.card h4 {
    margin-bottom:10px;
    font-weight:600;
}

.card .number {
    font-size:30px;
    font-weight:bold;
}
.card .icon {
    width:40px;
    margin-bottom:5px;
}

.card-bottom {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:10px;
}

.card .number {
    font-size:42px;
    font-weight:bold;
}


.card .hiasan {
    width:70px;
    opacity:0.9;
}

.card.yellow .number,
.card.yellow h4 {
    color:#fff;
}


.box {
    background:#fff;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

.box-title {
    font-weight:bold;
    color:#0b2c6a;
    margin-bottom:20px;
    position:relative;
}

.box-title::after {
    content:"";
    position:absolute;
    left:0;
    bottom:-8px;
    width:100%;
    height:2px;
    background:#cfcfcf; 
}


.bar {
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin:10px 0;
}

.bar .label {
    width:200px;
}

.bar-line {
    flex:1;
    height:6px;
    background:#eee;
    border-radius:10px;
    margin:0 10px;
    position:relative;
}

.bar-fill {
    height:6px;
    background:#d4a800;
    width:100%;
    border-radius:10px;
}
.label {
    width:220px;
    display:flex;
    align-items:center;
    gap:10px;
}

.icon-bar {
    width:22px;
}


.bottom {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.small-list {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.small-list .item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
    padding: 4px 0;
}

.small-list .left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.icon-list {
    width: 20px;
}


.bottom {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.small-list {
    display: flex;
    flex-direction: column;
    gap: 2px; 
}


.small-list .item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 3px 0; 
    margin: 0;
}


.small-list .left {
    display: flex;
    align-items: center;
    gap: 8px;
}

.icon-list {
    width: 20px;
}


.perbaikan .item {
    border-bottom: 1.5px solid #ff4d4d;
}


.peminjaman .item {
    border-bottom: 1.5px solid #1e4ed8;
}


@media(max-width:900px){
    .cards {
        grid-template-columns:1fr 1fr;
    }

    .bottom {
        grid-template-columns:1fr;
    }
}

.logout {
    margin-top: 30px;
    background: #ff1e1e;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 10px;
    padding: 12px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
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



.popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.75);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 999;
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
    width: 160px;
    margin-bottom: 20px;
}


.popup-content p {
    margin-bottom: 25px;
    font-size: 15px;
}


.btn-group {
    display: flex;
    justify-content: space-between;
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
    transition: all 0.25s ease;
}


.btn-cancel {
    background: #e0e0e0;
    color: #071D63;
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


.fade-delay-1 { animation-delay: 0.1s; }
.fade-delay-2 { animation-delay: 0.2s; }
.fade-delay-3 { animation-delay: 0.3s; }
.fade-delay-4 { animation-delay: 0.4s; }
.fade-delay-5 { animation-delay: 0.5s; }

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

    <div class="header fade-up fade-delay-1">DASHBOARD</div>

  
    <div class="cards">

    
    <div class="card yellow fade-up fade-delay-2">
        <img src="images/totalpengguna.png" class="icon">
        <h4>Total Pengguna</h4>

        <div class="card-bottom">
            <div class="number">40</div>
            <img src="images/hiasanputih.png" class="hiasan">
        </div>
    </div>

    
   <div class="card fade-up fade-delay-3">
        <img src="images/totalmobil.png" class="icon">
        <h4>Total Mobil</h4>

        <div class="card-bottom">
            <div class="number">40</div>
            <img src="images/hiasanbiru.png" class="hiasan">
        </div>
    </div>

   
   <div class="card fade-up fade-delay-4">
        <img src="images/totalmotor.png" class="icon">
        <h4>Total Motor</h4>

        <div class="card-bottom">
            <div class="number">40</div>
            <img src="images/hiasanbiru.png" class="hiasan">
        </div>
    </div>

   
    <div class="card fade-up fade-delay-5">
        <img src="images/totalruangan.png" class="icon">
        <h4>Total Ruangan</h4>

        <div class="card-bottom">
            <div class="number">40</div>
            <img src="images/hiasanbiru.png" class="hiasan">
        </div>
    </div>

</div>

    
    <div class="box fade-up fade-delay-3">
        <div class="box-title">Aset dengan Status Tersedia</div>

        <div class="bar">
    <div class="label">
        <img src="images/totalmobil.png" class="icon-bar">
        Kendaraan Mobil
    </div>
    <div class="bar-line"><div class="bar-fill"></div></div>
    <span>40</span>
</div>

<div class="bar">
    <div class="label">
        <img src="images/totalmotor.png" class="icon-bar">
        Kendaraan Motor
    </div>
    <div class="bar-line"><div class="bar-fill"></div></div>
    <span>40</span>
</div>

<div class="bar">
    <div class="label">
        <img src="images/totalruangan.png" class="icon-bar">
        Ruangan
    </div>
    <div class="bar-line"><div class="bar-fill"></div></div>
    <span>40</span>
</div>
    </div>

   
   <div class="bottom">

    
    <div class="box perbaikan fade-up fade-delay-4">
        <div class="box-title">Aset dalam Proses Perbaikan</div>

        <div class="small-list">

            <div class="item">
                <div class="left">
                    <img src="images/totalmobil.png" class="icon-list">
                    Kendaraan Mobil
                </div>
                <span>40</span>
            </div>

            <div class="item">
                <div class="left">
                    <img src="images/totalmotor.png" class="icon-list">
                    Kendaraan Motor
                </div>
                <span>40</span>
            </div>

            <div class="item">
                <div class="left">
                    <img src="images/totalruangan.png" class="icon-list">
                    Ruangan
                </div>
                <span>40</span>
            </div>

        </div>
    </div>

    
    <div class="box peminjaman fade-up fade-delay-5">
        <div class="box-title">Aset dalam Status Peminjaman</div>

        <div class="small-list">

            <div class="item">
                <div class="left">
                    <img src="images/totalmobil.png" class="icon-list">
                    Kendaraan Mobil
                </div>
                <span>40</span>
            </div>

            <div class="item">
                <div class="left">
                    <img src="images/totalmotor.png" class="icon-list">
                    Kendaraan Motor
                </div>
                <span>40</span>
            </div>

            <div class="item">
                <div class="left">
                    <img src="images/totalruangan.png" class="icon-list">
                    Ruangan
                </div>
                <span>40</span>
            </div>

        </div>
    </div>

</div>

<div class="popup" id="logoutPopup">
    <div class="popup-content">
        <img src="images/logout.png" width="120"><br><br>
        <p>Anda akan keluar dari akun. Lanjutkan?</p>

        <div class="btn-group">
            <button class="btn-cancel" onclick="closeLogout()">Batal</button>
            <button class="btn-exit" onclick="logout()">Keluar</button>
        </div>
    </div>
</div>
<script src="dashboard.js"></script>
</body>
</html>