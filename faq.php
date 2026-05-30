<?php
$currentPage = 'faq';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FAQ - DPU Bina Marga</title>

<style>
* { box-sizing: border-box; margin:0; padding:0; }

body {
    font-family: 'Segoe UI', sans-serif;
    background:#f4f4f4;
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

.logo-img { width: 40px; }
.profile-img { width: 50px; height: 50px; }

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


.faq-wrapper {
    max-width: 1100px;
    margin: 40px auto;
    display: flex;
    gap: 20px;
    align-items: flex-start; 
}


.faq-left {
    flex: 1;
}


.faq-title {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
}

.faq-title img {
    width: 45px;
}

.faq-title h2 {
    font-size: 28px;
    letter-spacing: 2px;
}


.faq-item {
    margin-bottom: 15px;
}


.faq-question {
    background: #102A6B;
    color: white;
    padding: 15px 20px;
    border-radius: 12px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.2);
}

.faq-icon {
    width: 0;
    height: 0;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-top: 9px solid #FFD700;
    transition: 0.3s;
}


.faq-item.active .faq-icon {
    transform: rotate(180deg);
}


.faq-answer {
    background: #FFD700;
    color: #071D63;
    padding: 18px;
    margin-top: 10px;
    border-radius: 12px;
    display: none;
    font-size: 14px;
}


.faq-item.active .faq-answer {
    display: block;
}


.faq-right {
    width: 400px; 
    flex-shrink: 0; 
    margin-top: 60px; 
}
.faq-right img {
    width: 100%;
    max-width: 400px;
}


@media(max-width:768px){
    .faq-wrapper{
        flex-direction: column;
        text-align: center;
    }

    .faq-right{
        text-align: center;
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
        <a href="berandaafterlog.php">Beranda</a>
        <a href="tentang.php">Tentang</a>
        <a href="pengaduan.php">Pengaduan</a>
        <a href="faq.php" class="active">FAQ</a>
    </nav>

    <a href="profile.php">
        <img src="images/profile.png" class="profile-img">
    </a>
</header>


<div class="faq-wrapper">

    
    <div class="faq-left">

        <div class="faq-title">
            <img src="images/faq1.png">
            <h2>Frequently Asked Questions</h2>
        </div>

       
        <div class="faq-item">
            <div class="faq-question">
                Apa itu sistem peminjaman infrastruktur ini ?
                <div class="faq-icon"></div>
            </div>
            <div class="faq-answer">
                Sistem ini merupakan platform digital yang digunakan untuk mengelola peminjaman infrastruktur seperti mobil, motor, laptop, dan ruang secara terintegrasi, sehingga proses menjadi lebih mudah, cepat, dan transparan.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Siapa saja yang dapat menggunakan sistem ini ?
                <div class="faq-icon"></div>
            </div>
            <div class="faq-answer">
                Sistem ini dapat digunakan oleh pegawai atau pihak yang memiliki akses untuk mengajukan peminjaman infrastruktur sesuai dengan kebutuhan operasional.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Bagaimana cara mengajukan peminjaman ?
                <div class="faq-icon"></div>
            </div>
            <div class="faq-answer">
                Pengguna cukup memilih kategori infrastruktur, menentukan aset yang tersedia, mengisi form peminjaman, dan mengajukan permintaan melalui sistem. Selanjutnya, permintaan akan diproses melalui tahap persetujuan.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Apakah saya bisa melihat status peminjaman ?
                <div class="faq-icon"></div>
            </div>
            <div class="faq-answer">
                Ya, pengguna dapat memantau status peminjaman secara langsung melalui sistem, mulai dari proses pengajuan, persetujuan, hingga selesai.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Apa yang harus dilakukan jika aset mengalami kerusakan ?
                <div class="faq-icon"></div>
            </div>
            <div class="faq-answer">
                Pengguna dapat melaporkan kerusakan melalui fitur pengaduan yang tersedia di sistem. Laporan akan diproses oleh admin untuk ditindaklanjuti.
            </div>
        </div>

    </div>

  
    <div class="faq-right">
        <img src="images/faq.png">
    </div>

</div>
<script src="faq.js"></script>
</body>
</html>