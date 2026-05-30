<?php
$currentPage = 'kelolauser';

$users = [
    ["nama"=>"Muhammad Ryan Ardiansyah","NIP"=>"199203102015021001", "telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Rakadia Pangestu","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Berliana Meisintia S","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Andyna Aulia Azzahra","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Naufal Abdul Muthalib","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Jasmine Aurora Angelita","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
    ["nama"=>"Oliver Alexander","NIP"=>"199203102015021001","telp"=>"+62 89612548511","foto"=>"images/profile.png"],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola User</title>

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
    flex-shrink:0;
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


.content {flex:1;padding:20px;}

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


.card {
    background:#fff;
    border-radius:20px;
    padding:10px 0;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
}


.table-head,
.row{
    display:grid;
    grid-template-columns:
        60px   
        100px  
        2fr   
        2fr    
        1.5fr  
        1fr    
        70px;

    align-items:center;
}


.table-head div {
    border-right: none;
    padding:12px 10px;
    text-align:center;
    font-weight:600;
}


.row div {
    border-right:1px solid #ddd;
    padding:12px 10px;
    text-align:center;
}


.row div:last-child {
    border-right:none;
}


.no {
    font-weight:600;
}


.avatar {
    width:50px;
    height:50px;
    border-radius:50%;
    
}

.delete img {
    width:22px;
    cursor:pointer;
    transition:0.2s;
}

.delete img:hover {
    transform:scale(1.2);
}


.no {width:40px;font-weight:600;}


.popup-hapus {
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.35);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:999;
}

.box-hapus {
    background:#f3f3f3;
    width:450px;
    border-radius:30px;
    padding:25px;
    text-align:center;
    animation:fadeIn 0.25s;
}

.box-hapus img {
    width:140px;
    margin-bottom:10px;
}

.box-hapus h3 {
    font-size:22px;
    color:#082567;
    margin-bottom:5px;
}

.box-hapus p {
    font-size:14px;
    color:#3f4c7a;
    margin-bottom:20px;
}


.btn-group {
    display:flex;
    gap:10px;
}

.btn-batal {
    flex:1;
    background:#ff120d;
    color:#fff;
    border:none;
    padding:10px;
    border-radius:12px;
    cursor:pointer;
}

.btn-hapus {
    flex:1;
    background:#082567;
    color:#fff;
    border:none;
    padding:10px;
    border-radius:12px;
    cursor:pointer;
}

.btn-batal:hover,
.btn-hapus:hover {
    transform:translateY(-2px);
}

@keyframes fadeIn {
    from {opacity:0;transform:translateY(20px);}
    to {opacity:1;transform:translateY(0);}
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

.table-container{
    background:#f4f4f4;
    border-radius:20px;
    padding:10px 0;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);

    display:flex;
    flex-direction:column;

    min-height:560px; 
}

.table-scroll{
    overflow-x:auto;
    overflow-y:hidden;
    width:100%;
}

.table-container{
    overflow:hidden;
}

.content{
    flex:1;
    padding:20px;
    min-width:0;
}


.table-wrapper{
    background:#f4f4f4;
    height:550px;

    display:flex;
    flex-direction:column;

    border-radius:28px;
    padding:15px 25px;

    box-shadow:0 5px 12px rgba(0,0,0,0.12);
}

.table-body{
    flex:1;
    overflow:hidden;

    display:flex;
    flex-direction:column;
}

.pagination{
    display:flex;
    justify-content:center;
    gap:8px;

    margin-top:auto;
    padding-top:20px;
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


.pagination button:disabled{
    opacity:0.5;
    cursor:not-allowed;
}


.pagination button:first-child:disabled,
.pagination button:last-child:disabled{
    color:#000 !important;
    opacity:1 !important;
}

.header {
    animation: fadeUpPage 0.7s ease;
}


.table-body {
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
.row{
    opacity:0;
}

@keyframes fadeUpRow{
    from{
        opacity:0;
        transform:translateY(25px);
    }
    to{
        opacity:1;
        transform:translateY(0);
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
    <a href="kelolauser.php" class="kelolauser active">Kelola User</a>
    <a href="peminjamanberjalan.php" class="peminjamanberjalan">Peminjaman Berjalan</a>
    <a href="laporanpengaduan.php" class="laporanpengaduan">Laporan Pengaduan</a>
    <a href="profileadmin.php" class="profileadmin">Profile</a>
</div>

  <button class="logout" onclick="openLogout()">Keluar</button>
</div>


<div class="content">

<div class="header">KELOLA USER</div>

<div class="table-container">

<div class="table-scroll">

<div class="table-content">

<div class="table-head">
    <div></div>
    <div></div>
    <div>Nama</div>
    <div>NIP</div>
    <div>No. telepon</div>
    <div>Password</div>
    <div></div>
</div>

<div class="table-body">

<?php $no=1; foreach($users as $u): ?>
<div class="row">
    <div class="no"><?= $no++ ?>.</div>

    <div>
        <img src="<?= $u['foto'] ?>" class="avatar">
    </div>

    <div><?= $u['nama'] ?></div>
    <div><?= $u['NIP'] ?></div>
    <div><?= $u['telp'] ?></div>
    <div>********</div>

    <div class="delete">
        <img src="images/hapusfile.png">
    </div>
</div>
<?php endforeach; ?>

</div>
</div> 
</div>

<div class="pagination" id="pagination"></div>

<div class="popup-hapus" id="popupHapus">
    <div class="box-hapus">
        <img src="images/hapus.png">

        <h3>Hapus User?</h3>
<p>Data user akan dihapus permanen dan tidak dapat dikembalikan</p>
        <div class="btn-group">
            <button class="btn-batal" id="btnBatal">Batal</button>
            <button class="btn-hapus">Hapus</button>
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

<script src="kelolauser.js"></script>

</body>
</html>