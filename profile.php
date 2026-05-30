<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($conn,
"SELECT * FROM user
WHERE id_user='$id_user'");
$data = mysqli_fetch_assoc($query);

if(isset($_POST['save_profile'])){
    $no_hp = $_POST['no_hp'];
    if(!empty($_POST['password_baru'])){
        $password = md5($_POST['password_baru']);
        mysqli_query($conn,
        "UPDATE user SET
        no_hp='$no_hp',
        password='$password'
        WHERE id_user='$id_user'");
    } else {
        mysqli_query($conn,
        "UPDATE user SET
        no_hp='$no_hp'
        WHERE id_user='$id_user'");
    }
    header("Location: profile.php");
    exit;
}

$currentPage = 'profile';
$page = isset($_GET['page']) ? $_GET['page'] : 'profil';

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profile - DPU Bina Marga</title>

<style>
* { margin:0; padding:0; box-sizing:border-box; }

body {
    font-family:'Segoe UI', sans-serif;
    background:#e9e9e9;

    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease;
}

body.show {
    opacity: 1;
    transform: translateY(0);
}


header {
    width: 85%;
    margin: 25px auto;
    background: #FED000;
    padding: 5px 25px;
    border-radius: 50px;
    display: flex;
    align-items: center;
}

.nav-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-img { 
    width: 40px; 
}

.profile-img { 
    width: 50px; 
    height: 50px; 
}

.logo-text {
    font-size: 11px;
    font-weight: bold;
    color: #071D63;
}

nav {
    flex: 1;
    display: flex;
    justify-content: center;
    gap: 30px;
}

nav a {
    text-decoration: none;
    color: #071D63;
    font-size: 14px;
    font-weight: bold;
    position: relative;
}


nav a.active::after {
    content:"";
    position:absolute;
    bottom:-5px;
    left:0;
    width:100%;
    height:2px;
    background:#071D63;
}


.container {
    width:85%;
    margin:20px auto; 
    display:flex;
    gap:25px;
    align-items:flex-start;
}


.sidebar {
    width:230px;
    background:#f3f3f3;
    padding:25px 20px;
    border-radius:20px;

    display:flex;
    flex-direction:column;
    justify-content:space-between;

    height:535px;
}

.menu a {
    display:block;
    padding:14px;
    margin:10px 0;
    background:white;
    color:#071D63;
    font-weight:600;
    border-radius:12px;
    text-align:center;
    text-decoration: underline;
}

.sidebar a {
    display: block;
    padding: 14px 16px;
    margin: 8px 0;
    text-decoration: none;
    background: white;
    color: #071D63;
    font-weight: 600;
    border-radius: 12px;
    transition: all 0.25s ease;
    text-align: center; 

    text-decoration: underline;
}

.sidebar a:hover {
    background: #819EFC;
    color: white;
    transform: translateX(5px); 
}


.sidebar a.active {
    background: #071D63;
    color: white;
}

.sidebar a.active:hover {
    background: #819EFC;
}


.sidebar a:active {
    transform: scale(0.97);
}

.btn-logout {
    background:#ff2e2e;
    color:white;
    border:none;
    padding:12px;
    border-radius:12px;
    cursor:pointer;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    transition: all 0.25s ease; 
}


.btn-logout:hover {
    background:#cc0000; 
    transform: translateY(-2px);
}


.btn-logout:active {
    transform: scale(0.96);
}


.content {
    flex:1;
    background:#f3f3f3;
    padding:25px;
    border-radius:20px;
    position:relative;
}


.banner {
    height:180px;
    background:url('images/sepeda.png') center/cover;
    border-radius:20px;
}

.avatar {
    width:130px;
    position:absolute;
    top:110px;
    left:100px;
    border-radius:15px;
    box-shadow:0 5px 10px rgba(0,0,0,0.2);
}

.data {
    margin-top:100px;
    padding:0 40px;
}

.data p {
    display: grid;
    grid-template-columns: 150px 20px 1fr; 
   

    align-items: center;
    margin: 18px 0;
    padding-bottom: 12px;
    border-bottom: 1px solid #cfcfcf;
    font-size: 15px;
}


.label {
    font-weight: 600;
}


.colon {
    text-align: center;
    font-weight: bold;
}


.value {
    text-align: left;
    font-weight: 600;
}


.btn-edit {
    position:absolute;
    right:30px;
    top:230px; 

    background:#FED000;
    color:#FFFFFF;

    border:none;
    padding:10px 18px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;

    display:flex;
    align-items:center;
    gap:8px;

    transition:0.25s;
}


.btn-edit img {
    width:16px;
}


.btn-edit:hover {
    background:#e6bd00;
    transform: translateY(-2px);
}


.btn-edit:active {
    transform: scale(0.95);
}


.edit-style {
    background:#102A6B;
    border-radius:25px;
    padding:35px 30px;
    width:380px;
    text-align:center;
    color:white;
}


.edit-title {
    margin-bottom:20px;
    font-size:18px;
}


.riwayat-wrapper {
    background:#f5f5f5;
    padding:15px;
    border-radius:15px;
    width:100%; 
}


.riwayat-card {
    background:#102A6B;
    color:white;
    padding:15px 18px;
    border-radius:12px;
    font-size:13px;
    line-height:1.6;
}


.riwayat-card p {
    margin:5px 0;
}


.divider {
    height:1px;
    background:#000000;
    margin:12px 0;
}

.content {
    flex:1;
    display:flex;
    flex-direction:column;
}


.riwayat-card:hover {
    transform:translateY(-3px);
    box-shadow:0 6px 12px rgba(0,0,0,0.15);
}


.edit-style input {
    width:100%;
    padding:12px;
    margin:12px 0;
    border-radius:12px;
    border:2px solid #FED000;
    background:transparent;
    color:white;
    outline:none;
    transition:0.2s;
}



.edit-style input:focus {
    border-color:#FFD700;
    box-shadow:0 0 8px rgba(255,215,0,0.4);
}


.edit-btn {
    display:flex;
    gap:15px;
    margin-top:15px;
}


.edit-style button {
    flex:1;
    padding:12px;
    border:none;
    border-radius:20px;
    font-weight:600;
    cursor:pointer;
    transition:0.25s;
}


.edit-style .btn-cancel {
    background:#e0e0e0;
    color:#071D63;
}

.edit-style .btn-cancel:hover {
    background:#cfcfcf;
    transform:translateY(-2px);
}


.edit-style .btn-save {
    background:#FED000;
    color:#FFFFFF;
}

.edit-style .btn-save:hover {
    background:#e6bd00;
    transform:translateY(-2px);
    box-shadow:0 6px 12px rgba(254,208,0,0.4);
}


.edit-style button:active {
    transform:scale(0.95);
}

.popup-content {
    animation: fadeIn 0.3s ease;
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

.btn-logout {
    background:#ff2e2e;
    color:white;
    border:none;
    padding:12px;
    border-radius:12px;
    cursor:pointer;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px; 
}

.btn-logout img {
    width:18px;
}


.title {
    text-align:center;
    font-weight:700;
    letter-spacing:2px;
    margin-bottom:15px;
}

.line {
    height:3px;
    width:100%;
    background:linear-gradient(to right,#FED000,#071D63);
    margin-bottom:20px;
}


.card {
    background:#071D63;
    color:white;
    padding:25px;
    border-radius:18px;
    margin:20px 0;
    line-height:1.6;
}



.status-wrapper{
    width:100%;
    padding:0;
}


.status-card{
    width:100%;
    background:#f5f5f5;
    border-radius:12px;
    overflow:hidden;
    margin-bottom:10px;
    border-bottom:2px solid #000;
}


.status-header{
    background:#102A6B;
    color:white;

    display:grid;
    grid-template-columns: 1fr 140px 120px;

    align-items:center;

    padding:8px 16px;
    font-size:12px;
    font-weight:700;
}


.status-body{
    display:grid;
    grid-template-columns: 1fr 140px 120px;

    align-items:center;
    gap:10px;

    padding:10px 16px;
}


.status-detail{
    font-size:12px;
    line-height:1.4;
}


.status-right{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;

    text-align:center;
}


.status-icon{
    width:40px;
    height:40px;

    display:flex;
    align-items:center;
    justify-content:center;
}

.status-icon img{
    width:30px;
    object-fit:contain;
}

.status-text{
    margin-top:4px;
    font-size:11px;
    font-weight:700;
    line-height:1.2;
}


.action-area{
    display:flex;
    justify-content:flex-end;
    align-items:center;
}


.btn-batal{
    width:100px;
    height:34px;

    border:none;
    border-radius:10px;

    background:#ff1d1d;
    color:white;

    font-size:11px;
    font-weight:700;
    cursor:pointer;

    transition:0.25s;
}


.btn-batal:hover{
    background:#d60000;
    transform:translateY(-2px);
}



.status-detail {
    font-size:13px;
    line-height:1.6;
}

.status-detail b {
    letter-spacing:1px;
}


.status-icon{
    display:flex;
    justify-content:center;
    align-items:center;

    height:50px; 
}

.status-icon img{
    width:40px;
    object-fit:contain;
}

.status-info{
    display:flex;
    align-items:center;
    gap:8px;

    font-size:13px;
    color:#666;

    margin-bottom:10px;
    padding-left:16px; 
}


.popup {
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.75);
    display:none;
    justify-content:center;
    align-items:center;
}

.popup-content {
    background:#071D63;
    padding:35px 30px;
    border-radius:25px;
    width:380px;
    text-align:center;
    color:white;
}

.popup-content img {
    width:160px; 
    margin-bottom:20px;
}


.popup-content p {
    margin-bottom:25px; 
    font-size:15px;
}


.btn-group {
    display:flex;
    justify-content:space-between;
    gap:15px; 
}


.popup button {
    flex:1;
    padding:12px;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
}


.popup .btn-cancel,
.popup .btn-exit {
    flex:1;
    padding:12px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    font-weight:600;

    transition: all 0.25s ease;
}


.popup .btn-cancel {
    background:#e0e0e0;
    color:#071D63;
}


.popup .btn-cancel:hover {
    background:#cfcfcf;
    transform: translateY(-2px);
}


.popup .btn-cancel:active {
    transform: scale(0.95);
}


.popup .btn-exit {
    background:#ff2e2e;
    color:white;
}


.popup .btn-exit:hover {
    background:#cc0000;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(255,0,0,0.3); 
}


.popup .btn-exit:active {
    transform: scale(0.95);
    box-shadow: none;
}

.fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}


.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}


.btn-batal:hover{
    background:#d60000;
    transform:translateY(-2px);
    box-shadow:0 6px 12px rgba(255,0,0,0.3);
}


.btn-batal:active{
    transform:scale(0.95);
}


.cancel-style{
    background:#071D63;
    width:650px;
    padding:35px 40px;
    border-radius:30px;
    text-align:center;
}

.cancel-style h2{
    color:white;
    font-size:28px;
    margin-bottom:40px;
    font-weight:700;
}


.cancel-btn-group{
    display:flex;
    justify-content:center;
    gap:40px;
}

.cancel-btn-group button{
    width:230px;
    height:60px;
    border:none;
    border-radius:18px;
    font-size:20px;
    font-weight:700;
    cursor:pointer;
    transition:0.25s;
}


.cancel-btn-group .btn-batal{
    background:#e9e9e9;
    color:#071D63;
}

.cancel-btn-group .btn-batal:hover{
    background:#dcdcdc;
    transform:translateY(-2px);
}


.cancel-btn-group .btn-ya{
    background:#ff1a1a;
    color:white;
}

.cancel-btn-group .btn-ya:hover{
    background:#e00000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(255,0,0,0.3);
}

</style>
</head>

<body>

<header>
    <div class="nav-left">
        <img src="images/logobina.png" class="logo-img">
        <div class="logo-text">
            DINAS PEKERJAAN UMUM BINA MARGA<br>
            PROVINSI JAWA TIMUR
        </div>
    </div>

    <nav>
        <a href="berandaafterlog.php">Beranda</a>
        <a href="tentang.php">Tentang</a>
        <a href="pengaduan.php">Pengaduan</a>
        <a href="faq.php">FAQ</a>
    </nav>

    <a href="profile.php">
        <img src="images/profile.png" class="profile-img">
    </a>
</header>

<div class="container">

<div class="sidebar">

    
    <div class="menu">
        <a href="?page=profil" class="<?= $page=='profil'?'active':'' ?>">Profil</a>
        <a href="?page=riwayat" class="<?= $page=='riwayat'?'active':'' ?>">Riwayat</a>
        <a href="?page=status" class="<?= $page=='status'?'active':'' ?>">Status</a>
    </div>

  
    <button class="btn-logout" onclick="openLogout()">
    <img src="images/keluar.png">
    Keluar
</button>

</div>

<div class="content">

<?php if($page=='profil'): ?>

<div class="banner fade-up"></div>
<img src="images/orang.png" class="avatar fade-up">

<button class="btn-edit" onclick="openEdit()">
    <img src="images/edit.png">
    Edit
</button>

<div class="data fade-up">
    <p><span class="label">Username</span><span class="colon">:</span><b class="value"><?= $data['username']; ?></b></p>
    <p><span class="label">NIP</span><span class="colon">:</span><b class="value"><?= $data['nip']; ?></b></p>
    <p><span class="label">No.Telp</span><span class="colon">:</span><b class="value"><?= $data['no_hp']; ?></b></p>
    <p><span class="label">Password</span><span class="colon">:</span><b class="value">****************</b></p>
</div>

<?php elseif($page=='riwayat'): ?>

<h2 class="title fade-up">- RIWAYAT PEMINJAMAN ANDA -</h2>
<div class="line fade-up"></div>

<div class="riwayat-wrapper fade-up">

    <?php 
    $riwayat = [
        ["mobil"=>"PORSCHE","plat"=>"L 333 NTO","tanggal"=>"16 April 2026 - 21 April 2026"],
        ["mobil"=>"PORSCHE","plat"=>"L 333 NTO","tanggal"=>"16 April 2026 - 21 April 2026"],
        ["mobil"=>"PORSCHE","plat"=>"L 333 NTO","tanggal"=>"16 April 2026 - 21 April 2026"]
    ];
    ?>

    <?php foreach($riwayat as $i => $r): ?>

        <div class="riwayat-card">
            <p>Mobil Dinas - <b><?= $r['mobil'] ?></b></p>
            <p>Plat : <b><?= $r['plat'] ?></b></p>
            <p>Tanggal Peminjaman : <b><?= $r['tanggal'] ?></b></p>
        </div>

        <?php if($i < count($riwayat)-1): ?>
            <div class="divider"></div>
        <?php endif; ?>

    <?php endforeach; ?>

</div>

<?php elseif($page=='status'): ?>

<h2 class="title fade-up">- LIHAT STATUS PEMINJAMAN AKTIF -</h2>
<div class="line fade-up"></div>

<div class="status-wrapper fade-up">

   
    <div class="status-info">
        <img src="images/info.png">
        Jika Peminjaman Anda telah disetujui. Silakan ambil aset sesuai jadwal.
    </div>

    <?php

    $dataStatus = [

        [
            "mobil" => "PORSCHE",
            "plat" => "L 333 NTO",
            "tanggal" => "16 April 2026 - 21 April 2026",
            "status" => "diproses"
        ],

        [
            "mobil" => "INNOVA REBORN",
            "plat" => "L 1234 AB",
            "tanggal" => "20 April 2026 - 22 April 2026",
            "status" => "diterima"
        ],

        [
            "mobil" => "PAJERO SPORT",
            "plat" => "L 999 XY",
            "tanggal" => "25 April 2026 - 27 April 2026",
            "status" => "ditolak"
        ]

    ];

    ?>

    <?php foreach($dataStatus as $data): ?>

<?php

if($data['status'] == "diproses"){
    $statusIcon = "images/diproses.png";
    $statusText = "Sedang Diproses";
}

elseif($data['status'] == "diterima"){
    $statusIcon = "images/terima.png";
    $statusText = "Pengajuan Diterima";
}

elseif($data['status'] == "ditolak"){
    $statusIcon = "images/tolak.png";
    $statusText = "Pengajuan Ditolak";
}

?>

<div class="status-card">

    
    <div class="status-header">
    <span>Detail Data</span>
    <span style="text-align:center;">Status</span>
    <span style="text-align:right;"></span>
</div>

 
    <div class="status-body">

        
        <div class="status-detail">
            Mobil Dinas - <b><?= $data['mobil'] ?></b><br>
            Plat : <b><?= $data['plat'] ?></b><br>
            Tanggal Peminjaman :
            <b><?= $data['tanggal'] ?></b>
        </div>

        
        <div class="status-right">

            <div class="status-icon">
                <img src="<?= $statusIcon ?>">
            </div>

            <div class="status-text">
                <?= $statusText ?>
            </div>

        </div>

       
        <div class="action-area">

            <?php if($data['status'] == "diproses"): ?>

                <button class="btn-batal" onclick="openCancelPopup(this)">
                    Batalkan
                </button>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php endforeach; ?>
</div>

<?php endif; ?>


<div class="popup" id="editPopup">
<form method="POST">
<div class="popup-content edit-style">

    <h3 class="edit-title">Edit Profil</h3>

    <input
    type="text"
    name="no_hp"
    placeholder="Nomor Telepon"
    value="<?= $data['no_hp']; ?>">

    <input
    type="password"
    name="password_baru"
    placeholder="Password Baru">

    <div class="btn-group edit-btn">

        <button
        type="button"
        class="btn-cancel"
        onclick="closeEdit()">

        Batal

        </button>

        <button
        type="submit"
        name="save_profile"
        class="btn-save">

        Simpan

        </button>

    </div>

</div>
</form>
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

<div class="popup" id="cancelPopup">

    <div class="popup-content cancel-style">

        <h2>Batalkan Pinjaman Anda?</h2>

        <div class="cancel-btn-group">

            <button class="btn-batal" onclick="closeCancelPopup()">
                Batal
            </button>

            <button class="btn-ya" onclick="confirmCancel()">
                YA
            </button>

        </div>

    </div>

</div>

<script src="profile.js"></script>

</body>
</html>