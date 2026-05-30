<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header('Location: login.php');
}

$currentPage = 'beranda after login';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Beranda After Login - DPU Bina Marga</title>

<style>
* { box-sizing: border-box; margin:0; padding:0; }

html { scroll-behavior: smooth; }

body {
    font-family: 'Segoe UI', sans-serif;
    background:#FFFFFF;
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
    position: relative;
}
.btn {
    background:#FED000;
    color:#071D63;
    padding:12px 22px;
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover {
    background:#e6bc00;
    transform:translateY(-2px);
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

.nav-right img {
    width: 34px;
    cursor: pointer;
}

.btn {
    display: inline-block;
    background:#FED000;
    color:#071D63;
    padding:12px 22px;
    border:none;
    border-radius:8px;
    font-weight:bold;
    font-size:14px; 
    cursor:pointer;
    transition:0.3s;
    text-decoration:none;
}

.btn:hover {
    background:#e6bc00;
    transform:translateY(-2px);
}


.hero {
    padding: 40px 40px 70px 40px;
}

.hero-content {
    max-width: 1100px;
    margin: auto;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;
}

.hero-text {
    flex: 1;
}

.hero-img {
    flex: 1;
    text-align: right;
}

.hero-text h1 {
    font-size: 38px;
    line-height: 1.6; 
    margin-bottom: 20px; 
    color: #071D63;
}

.hero-text span {
    color: #FED000;
}

.hero-text p {
    margin-bottom: 25px; 
    font-size: 15px;
    color: #071D63;
    line-height: 1.7; 
}

.hero-img img {
    width: 100%;
    max-width: 800px;
}


.kategori-section {
    text-align: center;
    padding: 70px 20px;
}

.kategori-section h2 {
    font-size: 30px;
    color: #071D63;
    margin-bottom: 8px;
}

.subtitle {
    margin-top: 0; 
    font-size: 14px;
    color: #071D63;
    max-width: 750px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.8;
}

.kategori-container {
    margin-top: 40px;
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.kategori-card {
    width: 270px;
    background: white;
    padding: 25px;
    border-radius: 20px;
    border: 2px solid #FED000;
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
    text-align: center;

    display: flex;            
    flex-direction: column;    
    justify-content: space-between; 
}

.kategori-card p {
    flex-grow: 1; 
}

.card-link {
    display: inline-block;
    align-self: center; 
    margin-top: 20px;
    padding-bottom: 5px;
    border-bottom: 2px solid #071D63;
    text-decoration: none;
    font-size: 13px;
    color: #071D63;
}

.kategori-card:hover {
    transform: translateY(-8px);
}

.kategori-card h3 {
    font-size: 14px;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.kategori-card img {
    display: block;
    margin: 15px auto;
}

.img-mobil { width: 150px; }
.img-motor { width: 140px; }
.img-ruang { width: 210px; }

.kategori-card p {
    font-size: 13px;
    color: #555;
    line-height: 1.6;
    margin-top: 10px;
}


.infra-section {
    text-align: center;
    padding: 70px 20px;
}

.infra-section h2 {
    font-size: 30px;
    color: #071D63;
}

.infra-desc {
    margin-top: 10px;
    font-size: 14px;
    color: #071D63;
    max-width: 750px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

.infra-content {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
}

.infra-side {
    width: 300px;
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.infra-item {
    display: flex;
    gap: 12px;
    text-align: left;
}

.infra-item img {
    width: 35px;
    height: 35px;     
    object-fit: contain; 
    flex-shrink: 0;   
}

.infra-item h3 {
    font-size: 14px;
    color: #071D63;
    margin-bottom: 5px;
}

.infra-item p {
    font-size: 13px;
    color: #555;
    line-height: 1.6;
}

.infra-center img {
    width: 350px;
}


.pengaduan-section {
    padding: 70px 20px;
    margin-top: 10px;
}

.pengaduan-container {
    width: 100%;
    max-width: 1200px;
    margin: auto;

    display: flex;
    align-items: center;
    gap: 40px;

    background: #f3f3f3;
    padding: 40px 60px;
    border-radius: 20px;
}

.pengaduan-img,
.pengaduan-text {
    flex: 1;
}

.pengaduan-img img {
    margin-left: 0;   
    display: block;
}

.pengaduan-img img {
    width: 100%;
    max-width: 400px; 
}

.pengaduan-text h2 {
    font-size: 30px;
    color: #071D63;
    margin-bottom: 30px; 
}

.pengaduan-text p {
    margin-bottom: 30px; 
    font-size: 15px;
    color: #555;
    line-height: 1.7;
}

.pengaduan-text button {
    background: #071D63;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;

    transition: all 0.25s ease;
}

.pengaduan-text button:hover {
    background: #0a2c8f;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.pengaduan-text button:active {
    transform: scale(0.96);
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    background: #061850;
}


.footer {
    background: #2d2d2d;
    color: white;
    padding: 60px 20px 20px;
}

.footer-container {
    max-width: 1100px;
    margin: auto;
    display: flex;
    gap: 40px;
}

.footer-left,
.footer-right {
    flex: 1;
}

.footer-left {
    color: #eee;
}

.footer-head {
    display: flex;
    align-items: center;
    gap: 12px;
    line-height: 1.7;
}

.footer-logo {
    width: 50px;
    height: auto;
}

.footer-title {
    font-size: 13px;
    font-weight: bold;
    line-height: 1.5;
    color: #fff;
    text-transform: uppercase;
}

.footer-space {
    margin-top: 15px;
    margin-bottom: 10px;
}

.footer-desc {
    border-left: 3px solid #FFD700; 
    padding-left: 12px; 
}

.footer-desc div {
    font-size: 13px;
    color: #ccc;
    line-height: 1.6;
}

.footer-social {
    margin-top: 15px;
    padding-left: 12px; 
    display: flex;
    gap: 15px;
}

.footer-social img {
    width: 22px;
    height: 22px;
    transition: 0.3s;
    cursor: pointer;
}

.footer-social img:hover {
    transform: scale(1.2);
    filter: brightness(1.2);
}

.footer-right {
    display: flex;
    flex-direction: column;
    gap: 18px; 
}

.footer-item {
    display: flex;
    gap: 10px;
    align-items: flex-start;
   
}

.footer-item:first-child {
    margin-top: 20px; 
}

.footer-item img {
    width: 18px;
    height: 18px;
    object-fit: contain;
    filter: brightness(0) invert(1);
    margin-top: 3px;
}

.footer-item p {
    font-size: 13px;
     color: rgba(255,255,255,0.75);
    line-height: 1.6;
}

.footer-bottom {
    margin-top: 40px;
    text-align: center;
    font-size: 12px;
    color: #bbb;
    border-top: 1px solid #555;
    padding-top: 15px;
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

    .hero-text h1{
        font-size: 28px;
    }

    .hero-text p{
        font-size: 14px;
    }

    .hero-img img{
        max-width: 300px;
        margin: auto;
    }

    .kategori-card{
        width: 90%;
    }

    .infra-center img{
        width: 250px;
    }

    .pengaduan-img img{
        max-width: 300px;
        margin: auto;
    }
}

.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
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
    <a href="berandaafterlog.php" class="active">Beranda</a>
    <a href="tentang.php">Tentang</a>
    <a href="pengaduan.php">Pengaduan</a>
    <a href="faq.php">FAQ</a>
</nav>

    <a href="profile.php">
        <img src="images/profile.png" class="profile-img">
    </a>
</header>


<section class="hero fade-up">
    <div class="hero-content">

       
        <div class="hero-text">
            <h1>
                Kelola Peminjaman <br>
                <span>Infrastruktur</span> dengan <br>
                Lebih Mudah dan <br>
                Terintegrasi
            </h1>

            <p>
                Satu platform untuk mengatur peminjaman kendaraan, ruang, barang,
                hingga alat berat secara cepat, transparan, dan efisien guna
                mendukung kegiatan operasional Anda.
            </p>
            
          <a href="#kategori" class="btn">Ajukan Peminjaman</a>
            
        </div>

        
        <div class="hero-img">
            <img src="images/beranda.png">
        </div>

    </div>
</section>


<section id="kategori" class="kategori-section fade-up">

    <h2>Kategori Infrastruktur yang Tersedia</h2>

    <p class="subtitle">
        Pilih berbagai fasilitas yang dapat dipinjam sesuai kebutuhan operasional Anda, 
        mulai dari kendaraan hingga perangkat kerja, semuanya tersedia dalam satu sistem 
        yang mudah dan terintegrasi.
    </p>

    <div class="kategori-container">

   
<div class="kategori-card">
    <h3>MOBIL</h3>
    <img src="images/mobil.png" class="img-mobil">
    <p>
        Mendukung mobilitas kegiatan operasional dengan kendaraan dinas yang siap digunakan
        untuk perjalanan resmi maupun kegiatan lapangan.
    </p>
    <a href="peminjamanmobil.php" class="card-link">Ajukan Peminjaman</a>
</div>

<div class="kategori-card">
    <h3>MOTOR</h3>
    <img src="images/motor.png" class="img-motor">
    <p>
        Solusi transportasi yang praktis dan efisien untuk menunjang aktivitas operasional
        jarak dekat dengan lebih cepat dan fleksibel.
    </p>
    <a href="peminjamanmotor.php" class="card-link">Ajukan Peminjaman</a>
</div>


<div class="kategori-card">
    <h3>RUANG</h3>
    <img src="images/ruang.png" class="img-ruang">
    <p>
        Gunakan fasilitas ruang untuk berbagai keperluan seperti rapat, koordinasi,
        dan kegiatan internal dengan lebih terjadwal dan terorganisir.
    </p>
    <a href="peminjamanruang.php" class="card-link">Ajukan Peminjaman</a>
</div>

</div>

       

</section>


<section class="infra-section fade-up">

    <h2>Dari Proses Manual ke Manajemen Infrastruktur yang Lebih Cerdas</h2>

    <p class="infra-desc">
        Ada beberapa alasan mendasar mengapa kami merancang sistem peminjaman 
        infrastruktur digital ini, terutama sebagai upaya optimalisasi tata kelola aset 
        di lingkungan Dinas PU Bina Marga.
    </p>

    <div class="infra-content">

      
        <div class="infra-side">
            
            <div class="infra-item">
                <img src="images/satu.png">
                <div>
                    <h3>Akuntabilitas Pemanfaatan Infrastruktur</h3>
                    <p>
                        Membangun sistem pencatatan riwayat penggunaan yang sistematis 
                        guna menjamin transparansi dan kemudahan proses audit aset.
                    </p>
                </div>
            </div>

            <div class="infra-item">
                <img src="images/dua.png">
                <div>
                    <h3>Pusat Informasi Terintegrasi</h3>
                    <p>
                        Menyatukan seluruh data infrastruktur dalam satu kendali untuk 
                        menghilangkan sekat informasi antar bidang.
                    </p>
                </div>
            </div>

        </div>

       
        <div class="infra-center">
            <img src="images/infra.png">
        </div>

       
        <div class="infra-side">
            
            <div class="infra-item">
                <img src="images/tiga.png">
                <div>
                    <h3>Kemudahan Prosedur dalam Satu Pintu</h3>
                    <p>
                        Memberikan akses yang lebih luas bagi unit terkait untuk 
                        melakukan permohonan peminjaman secara mandiri melalui satu 
                        antarmuka digital.
                    </p>
                </div>
            </div>

            <div class="infra-item">
                <img src="images/empat.png">
                <div>
                    <h3>Keseragaman Prosedur Administrasi</h3>
                    <p>
                        Menerapkan standar operasional (SOP) yang sama untuk setiap 
                        proses peminjaman guna menciptakan tata kelola birokrasi 
                        yang konsisten.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>


<section class="pengaduan-section fade-up">

    <div class="pengaduan-container">

       
        <div class="pengaduan-img">
            <img src="images/pengaduan.png">
        </div>

        
        <div class="pengaduan-text">
            <h2>Optimalisasi Pengawasan Aset Infrastruktur</h2>

            <p>
                Laporkan ketidaksesuaian prosedur, kerusakan aset, atau kendala 
                administrasi di sini. Kami berkomitmen menjaga transparansi demi 
                mewujudkan tata kelola aset yang akuntabel di lingkungan 
                Dinas PU Bina Marga.
            </p>

           <button onclick="location.href='pengaduan.php'">
             Buat pengaduan
            </button>
        </div>

    </div>

</section>


<footer class="footer fade-up">

    <div class="footer-container">

        

<div class="footer-left">

   
    <div class="footer-head">
        <img src="images/logobina.png" class="footer-logo">
        <div class="footer-title">
            DINAS PEKERJAAN UMUM BINA MARGA<br>
            PROVINSI JAWA TIMUR
        </div>
    </div>

    <div class="footer-space"></div>

   
    <div class="footer-desc">
    <div>Mulai kelola peminjaman</div>
    <div>Infrastruktur dengan Lebih mudah dan</div>
    <div>Terstruktur melalui Satu sistem</div>
    <div>terintegrasi</div>
</div>


<div class="footer-social">
    <a href="https://x.com/dbmjatim" target="_blank">
        <img src="images/twitter.png">
    </a>
    <a href="https://www.instagram.com/binamargajatim" target="_blank">
        <img src="images/instagram.png">
    </a>
    <a href="https://www.youtube.com/channel/UChGZiOkcah5NwxlTUqFm9ZQ" target="_blank">
        <img src="images/youtube.png">
    </a>
    <a href="https://www.facebook.com/binamargajatimprov" target="_blank">
        <img src="images/facebook.png">
    </a>
</div>

</div>


        
        <div class="footer-right">

            <div class="footer-item">
                <img src="images/alamat.png">
                <p>
                    Jl. Gayung Kebonsari No.167, Gayungan, 
                    Kec. Gayungan, Surabaya, Jawa Timur 60235
                </p>
            </div>

            <div class="footer-item">
                <img src="images/telp.png">
                <p>031-8290186, 8280433</p>
            </div>

            <div class="footer-item">
                <img src="images/email.png">
                <p>binamarga@jatimprov.go.id</p>
            </div>

            <div class="footer-item">
                <img src="images/waktu.png">
                <p>
                    Senin - Kamis : 08:00 – 16:00 <br>
                    Jumat : 07:30 – 16:00 <br>
                    Sabtu - Minggu : Libur
                </p>
            </div>

        </div>

    </div>

   
    <div class="footer-bottom">
        Copyright © 2026 | Dinas PU Bina Marga Provinsi Jawa Timur. 
        All rights reserved
    </div>

</footer>
<script src="berandaafterlog.js"></script>
</body>
</html>