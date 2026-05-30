<?php
$currentPage = 'tentang';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tentang - DPU Bina Marga</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* { box-sizing: border-box; margin:0; padding:0; }

body {
    font-family: 'Segoe UI', sans-serif;
    background:#f4f4f4;
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

.logo-img { width: 40px; }

.profile-img { 
    width: 50px; 
    height: 50px; 
}

.logo-text {
    font-size: 11px;
    font-weight: bold;
    color: #071D63;
    line-height: 1.2;
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
    font-family: 'Segoe UI', sans-serif;
    position: relative;
}


nav a:visited,
nav a:link,
nav a:hover,
nav a:active {
    color: #071D63;
    text-decoration: none;
}


nav a::after {
    content: "";
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: #071D63;
    transition: 0.3s;
}


nav a.active::after {
    width: 100%;
}


.container {
    width: 85%;
    margin: 60px auto;
    display: flex;
    align-items: center;
    gap: 60px;
}


.image-box {
    flex: 1;
    text-align: center;
}

.image-box img {
    width: 100%;
    max-width: 400px;
    border-radius: 25px;
}


.content {
    flex: 1;
    max-width: 550px;
}

.content h1 {
    font-size: 42px;
    margin-bottom: 20px;
}

.content strong { color: #071D63; }
.content span { color: #FED000; }

.content p {
    margin-bottom: 20px;
    line-height: 1.9;
    text-align: justify;
}


.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: 0.8s;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}


@media(max-width:768px){

    header{
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    nav{
        flex-wrap: wrap;
        gap: 15px;
    }

    .container {
        flex-direction: column;
        text-align: center;
        width: 90%;
        gap: 30px;
    }

    .content h1 {
        font-size: 28px;
    }

    .content p {
        text-align: center;
        font-size: 14px;
    }

    .image-box img {
        max-width: 280px;
        margin: auto;
    }
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
        <a href="berandaafterlog.php" class="<?= ($currentPage=='beranda') ? 'active' : '' ?>">Beranda</a>
        <a href="tentang.php" class="<?= ($currentPage=='tentang') ? 'active' : '' ?>">Tentang</a>
        <a href="pengaduan.php" class="<?= ($currentPage=='pengaduan') ? 'active' : '' ?>">Pengaduan</a>
        <a href="faq.php" class="<?= ($currentPage=='faq') ? 'active' : '' ?>">FAQ</a>
    </nav>

    <a href="profile.php">
        <img src="images/profile.png" class="profile-img">
    </a>
</header>


<div class="container fade-up">

   
    <div class="image-box">
        <img src="images/tentang.png">
    </div>

   
    <div class="content">
        <h1>
            <strong>Tentang</strong> <span>Kami</span>
        </h1>

        <p>
Sistem ini merupakan platform digital yang dirancang untuk mempermudah pengelolaan peminjaman infrastruktur seperti mobil, motor, laptop, dan ruang dalam satu sistem yang terintegrasi. Melalui platform ini, pengguna dapat melakukan pengajuan peminjaman, memantau status penggunaan, serta mengelola jadwal secara lebih terstruktur dan efisien.
</p>

<p>
Selain itu, sistem ini juga mendukung proses persetujuan yang lebih transparan serta pencatatan data yang terdokumentasi dengan baik, sehingga dapat meningkatkan efektivitas pengelolaan aset dan mendukung kelancaran kegiatan operasional.
</p>
    </div>

</div>


<script src="tentang.js"></script>

</body>
</html>