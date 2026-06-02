<?php
session_start();
include 'koneksi.php';

// cek apakah admin sudah login
if(!isset($_SESSION['admin'])){
    header("Location: loginuser.php");
    exit;
}

$id_admin = $_SESSION['admin'];

$query = mysqli_query($conn,
    "SELECT * FROM admin WHERE id_admin='$id_admin'");

$admin = mysqli_fetch_assoc($query);

$currentPage = 'profileadmin';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Admin</title>

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
    margin-left:70px;
    margin-bottom:20px;
}



.profile-card{
    background:#efefef;
    border-radius:28px;
    padding:8px;
    margin-bottom:18px;

    box-shadow:0 4px 8px rgba(0,0,0,0.12);
}

.banner{
    width:100%;
    height:230px;
    object-fit:cover;
    border-radius:24px;
}



.profile-info{
    display:flex;
    align-items:flex-end;
    gap:20px;

    padding:0 28px 8px;

    margin-top:-58px; 
}


.profile-img{
    width:95px; 
    height:95px;

    border-radius:50%;
    border:3px solid #fff;

    object-fit:cover;
    background:#fff;

    box-shadow:0 3px 8px rgba(0,0,0,0.12);
}

.role-box{
    padding-bottom:6px;
}

.role-box h3{
    font-size:13px;
    color:#111;
    font-weight:500;
}

.role-box span{
    font-weight:700;
}

.access-box{
    padding-bottom:0;
    position:relative;
    top:5px;
}
.access-box h3{
    font-size:13px;
    margin-bottom:1px;
    font-weight:700;
}

.access-box p{
    font-size:12px;
    line-height:1.4;
}
.info-right{
    display:flex;
    align-items:flex-end;
    gap:50px;
}



.detail-card{
    background:#efefef;
    border-radius:28px;

    padding:12px 40px;

    box-shadow:0 4px 8px rgba(0,0,0,0.12);
}

.detail-row{
    display:grid;

    grid-template-columns:
        150px
        20px
        1fr;

    align-items:center;

    padding:18px 0;

    border-bottom:1px solid #9f9f9f;
}

.detail-row:last-child{
    border-bottom:none;
}

.detail-row label{
    font-size:15px;
    color:#333;
}

.detail-row .colon{
    font-size:15px;
    font-weight:700;
    color:#333;
}

.detail-row .value{
    font-size:15px;
    font-weight:700;
    color:#333;

    letter-spacing:1px;
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

    animation:fadeIn 0.25s ease;
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
    transition:0.2s;
}

.btn-cancel{
    background:#e5e5e5;
    color:#071D63;
}

.btn-exit{
    background:#ff2d2d;
    color:#fff;
}

.btn-cancel:hover,
.btn-exit:hover{
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



@media(max-width:1200px){

    body{
        flex-direction:column;
    }

    .sidebar{
        width:auto;
        min-height:auto;
    }

    .content{
        padding:15px;
    }

    .header{
        margin-left:0;
        border-radius:20px;
    }

    .profile-info{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
        margin-top:-80px;
    }

    .profile-img{
        width:150px;
        height:150px;
    }

    .detail-card{
        padding:25px;
    }

    .detail-row{
        grid-template-columns:1fr;
        gap:8px;
    }
}


.header{
    animation: fadeUpPage 0.7s ease;
}

.profile-card{
    animation: fadeUpPage 0.9s ease;
    animation-delay: 0.2s;
    animation-fill-mode: both;
}

.detail-card{
    animation: fadeUpPage 1s ease;
    animation-delay: 0.35s;
    animation-fill-mode: both;
}


.profile-img{
    animation: fadeUpPage 1.1s ease;
    animation-delay: 0.45s;
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

        <a href="laporanpengaduan.php" class="laporanpengaduan">
            Laporan Pengaduan
        </a>

        <a href="profileadmin.php" class="profileadmin active">
            Profile
        </a>

    </div>

    <button class="logout" onclick="openLogout()">
        Keluar
    </button>

</div>



<div class="content">

    <div class="header">
        PROFIL
    </div>



    <div class="profile-card">

        <img src="images/admin.png" class="banner">

        <div class="profile-info">

    <img src="images/<?php echo $admin['foto']; ?>" class="profile-img">

    <div class="info-right">

        <div class="role-box">
            <h3>
                <span>Role :</span> Admin
            </h3>
        </div>

        <div class="access-box">

            <h3>Hak Akses :</h3>

            <p>
                [Kelola Aset]
                [Approve Peminjaman]
                [Kelola User]
            </p>

        </div>

    </div>

</div>

  

    <div class="detail-card">

        <div class="detail-row">
            <label>Username</label>
            <div class="colon">:</div>
            <div class="value">
    <?php echo $admin['username']; ?>
        </div>
        </div>

        <div class="detail-row">
            <label>NIP</label>
            <div class="colon">:</div>
            <div class="value">
    <?php echo $admin['nip']; ?>
        </div>
        </div>

        <div class="detail-row">
            <label>Password</label>
            <div class="colon">:</div>
            <div class="value">
    <?php echo str_repeat('*', 12); ?>
        </div>
        </div>

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

<script src="profileadmin.js"></script>

</body>
</html>