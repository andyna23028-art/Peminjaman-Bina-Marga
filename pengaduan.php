<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}
$id_user = $_SESSION['id_user'];
$queryUser = mysqli_query(
    $conn,
    "SELECT * FROM user WHERE id_user='$id_user'"
);

$dataUser = mysqli_fetch_assoc($queryUser);

$currentPage = 'pengaduan';
$showPopup = false;

if(isset($_POST['kirim_pengaduan'])){

    $nama = $dataUser['username'];
    $nip = $dataUser['nip'];
    $keluhan = $_POST['keluhan'];
    $status = 'Belum';
    $tanggal = date('Y-m-d');

    $insert = mysqli_query(
        $conn,
        "INSERT INTO pengaduan
        (id_user, nama, nip, keluhan, status, tanggal)
        VALUES
        ('$id_user', '$nama', '$nip', '$keluhan', '$status', '$tanggal')"
    );

    if($insert){
        $showPopup = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengaduan - DPU Bina Marga</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    width: 80%;
    margin: 40px auto;
    display: flex;
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    position: relative;
}

.left {
    width: 60%;
}

.left h1 {
    font-size: 36px;
    color: #071D63;
}

.left p {
    margin: 10px 0 25px;
    color: #555;
}

input, textarea {
    width: 90%;
    padding: 15px;
    border-radius: 15px;
    border:1px solid #ddd;
    margin-bottom: 15px;
}

textarea {
    height: 150px;
}

button {
    background:#071D63;
    color:white;
    border:none;
    padding:15px 25px;
    border-radius:15px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover {
    background:#0a2c8f;
    transform: scale(1.05);
}

.right {
    width: 40%;
    position: relative;
}

.blue-box {
    position: absolute;
    right: 0;
    top: 0;
    width: 45%;
    height: 100%;
    background: #071D63;
    border-radius: 0;
    
}

.yellow-box {
    position: absolute;
    top: 80px;
    right: 80px;
    width: 70%;
    background: #FED000;
    padding: 20px;
    border-radius: 20px;
    z-index: 2;
    color: #071D63;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.contact-item img {
    width: 20px;
    margin-right: 10px;
}

.accent {
    position: absolute;
    top: -20px;
    right: 20px;
    width: 20px;
    height: 60px;
    background: #FED000;
    z-index: 3;
}

.social {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.social a {
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

.social img {
    width: 23px;
    height: 23px;          
    object-fit: contain;   
    display: block;
}

.social a:focus,
.social a:active {
    outline: none;
}

.social img:hover {
    transform: scale(1.2);
    opacity: 0.7;
}

button {
    background:#071D63;
    color:white;
    border:none;
    padding:15px 30px;
    border-radius:15px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover {
    background:#0a2c8f;
    transform: scale(1.05);
}

.popup {
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    display:flex;
    justify-content:center;
    align-items:center;
    opacity:0;
    visibility:hidden;
    transition:0.3s;
    z-index:9999;
}

.popup.show {
    opacity:1;
    visibility:visible;
}

.popup-box {
    width: 700px;              
    max-width: 90%;
    height: 220px;             
    background: #0d2a6b;
    border-radius: 20px;
    display: flex;
    align-items: center;
    padding: 25px 35px;
    position: relative;
    overflow: hidden;
    gap: 30px;
}

.popup-left {
    flex: 1;
    display: flex;
    justify-content: center;
}

.popup-left img {
    width: 160px;   
}

.popup-right {
    flex: 2;
    color: white;
}

.popup-right h2 {
    font-size: 28px;
    margin-bottom: 8px;
}

.popup-right hr {
    border: none;
    border-top: 2px solid rgba(255,255,255,0.5);
    margin: 8px 0 15px;
    width: 80%;
}

.popup-right p {
    font-size: 16px;
    line-height: 1.5;
}


.popup-box::before {
    content: "";
    position: absolute;
    top: -30px;
    right: -30px;
    width: 90px;
    height: 90px;
    background: #FED000;
    border-radius: 50%;
}

.popup-box::after {
    content: "";
    position: absolute;
    bottom: -30px;
    right: 40px;
    width: 80px;
    height: 80px;
    border: 3px solid #FED000;
    border-radius: 50%;
}

.popup-box img {
    width:120px;
    margin-bottom:20px;
}


.fade-up {
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 0.8s ease forwards;
}

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


@media(max-width:768px){
    .container{
        flex-direction: column;
        width: 90%;
    }

    .left, .right {
        width: 100%;
    }

    .blue-box,
    .yellow-box,
    .accent {
        position: relative;
        width: 100%;
        right: 0;
        top: 0;
        margin-top: 15px;
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

    <div class="left">
        <form method="POST">
            <h1>Ada Kendala? Laporkan di Sini</h1>
            <p>Gunakan formulir ini untuk melaporkan kerusakan atau kendala pada aset yang sedang digunakan</p>

            <input
            type="text"
            name="nama"
            value="<?= $dataUser['username'] ?>"
            readonly>
            <input
            type="text"
            name="nip"
            value="<?= $dataUser['nip'] ?>"
            readonly>
            <textarea
            name="keluhan"
            placeholder="Keluhan (Lengkap dengan Plat/Kode)"
            required></textarea>
            <button
                type="submit"
                name="kirim_pengaduan">
                    Ajukan Pengaduan
            </button>
        </form>
    </div>

   
    <div class="right">

        <div class="blue-box"></div>

        <div class="yellow-box">
            <h3>Alamat Kontak</h3>

            <div class="contact-item">
                <img src="images/alamat.png">
                <span>Jl. Gayung Kebonsari No.167, Gayungan, Surabaya</span>
            </div>

            <div class="contact-item">
                <img src="images/telp.png">
                <span>031-8290186, 8280433</span>
            </div>

            <div class="contact-item">
                <img src="images/email.png">
                <span>binamarga@jatimprov.go.id</span>
            </div>

            <div class="contact-item">
                <img src="images/waktu.png">
                <span>
                    Senin - Kamis : 08:00 – 16:00<br>
                    Jumat : 07:30 – 16:00<br>
                    Sabtu - Minggu : Libur
                </span>
            </div>
        </div>

        <div class="accent"></div>

        <div class="social">
    <a href="https://x.com/dbmjatim" target="_blank" rel="noopener noreferrer">
        <img src="images/twitter.png" alt="Twitter">
    </a>
    <a href="https://www.instagram.com/binamargajatim" target="_blank" rel="noopener noreferrer">
        <img src="images/instagram.png" alt="Instagram">
    </a>
    <a href="https://www.youtube.com/channel/UChGZiOkcah5NwxlTUqFm9ZQ" target="_blank" rel="noopener noreferrer">
        <img src="images/youtube.png" alt="YouTube">
    </a>
    <a href="https://www.facebook.com/binamargajatimprov" target="_blank" rel="noopener noreferrer">
        <img src="images/facebook.png" alt="Facebook">
    </a>
</div>

    </div>

</div>


<div class="popup" id="popup">
    <div class="popup-box">
        <div class="popup-left">
            <img src="images/pengaduanpopup.png">
        </div>
        <div class="popup-right">
            <h2>Pengaduan Berhasil</h2>
            <hr>
            <p>Terima kasih, laporan Anda sedang dalam proses penanganan.</p>
        </div>
    </div>
</div>

<?php if($showPopup): ?>
<script>
window.onload = function(){

    const popup = document.getElementById("popup");

    popup.classList.add("show");

    setTimeout(() => {
        popup.classList.remove("show");
    }, 3000);

}
</script>
<?php endif; ?>

</body>
</html>