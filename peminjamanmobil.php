<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman Mobil</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f5f6fa;
    margin: 0;
}


.container {
    max-width: 1100px;
    margin: auto;
    padding: 0 0px;
}


.header {
    display: flex;
    align-items: center;
    padding: 10px 40px 0;
}

.header img {
    width: 45px;
}

.header-text {
    font-size: 12px;
    line-height: 1.1;
    font-weight: 600;
    color: #1a2c6b;
}


.title {
    padding: 10px 40px;
}

.title h1 {
    font-size: 20px;
    color: #071D63;
    margin-left: 50px;
}

.line {
    height: 1px;
    background: #071D63;
}


.title-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.back-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    margin-top: 50px;

    transition: all 0.3s ease;
}

.back-btn img {
    width: 20px;
    transition: transform 0.3s ease;
}

.back-btn span {
    color: red;
    font-weight: 600;
    font-size: 14px;
    transition: transform 0.3s ease;
}


.back-btn:hover img,
.back-btn:hover span {
    transform: translateX(-5px);
}

.back-btn:hover {
    opacity: 0.8;
}


.filter {
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
}

.filter button {
    flex: 1;
    margin: 0 10px;
    padding: 12px 0;
    border-radius: 50px;
    border: 2px solid #071D63;
    background: white; 
    color: #071D63;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}


.filter button:hover {
    background: #071D63;
    color: white;
}


.filter .active {
    background: #071D63;
    color: white;
}


.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}

.card {
    display: flex;
    gap: 10px;
    padding: 8px;
    border-radius: 14px;
    background: #f1f1f1;
    transition: 0.25s ease;
    
    text-decoration: none;
    color: inherit;
}



.card-img {
    width: 120px;
    height: 120px;
    background: #f1f1f1; 
    border-radius: 12px;

    display: flex;
    justify-content: center;
    align-items: center;
}

.card-img img {
    max-width: 90%;
    max-height: 80px;
    object-fit: contain;
}


.card-info {
    flex: 1;
    background: #fff;
    border-radius: 12px;
    padding: 10px 14px;

    display: flex;
    flex-direction: column;
    justify-content: center;
}


.card:hover {
    background: #FED000;
}

.card:hover .card-img {
    background: #FED000;
}

.card:hover .card-info {
    background: #fff;
}


.card-info h3 {
    margin: 0;
    font-size: 15px; 
    font-weight: 700;
}

.meta {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 4px;
    font-size: 13px;
}

.meta img {
    width: 16px;
}

.status {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 6px;
    font-size: 13px;
    font-weight: 600;
}

.status img {
    width: 18px;
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

</style>
</head>

<body>


<div class="header">
    <img src="images/logobina.png">
    <div class="header-text">
        DINAS PEKERJAAN UMUM BINA MARGA<br>
        PROVINSI JAWA TIMUR
    </div>
</div>


<div class="title">
    <div class="title-top">

        <h1 class="fade-up">
            Ajukan Peminjaman Mobil Dinas<br>
            dengan Mudah dan Cepat
        </h1>

        <a href="/ProjectBinaMarga/berandaafterlog.php#kategori" class="back-btn fade-up">
            <img src="images/kembali.png">
            <span>Kembali</span>
        </a>

    </div>

    <div class="line"></div>
</div>


<div class="container">

   
    <div class="filter fade-up">
    <button data-filter="tersedia">Tersedia</button>
    <button data-filter="dipinjam">Dipinjam</button>
    <button data-filter="maintenance">Maintenance</button>
</div>

    
    <div class="grid">

<a href="detailmobil.php?mobil=porsche" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/porsche.png">
    </div>
    <div class="card-info">
        <h3>PORSCHE</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 333 NTO</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2025</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=reborn" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/reborn.png">
    </div>
    <div class="card-info">
        <h3>REBORN</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 000 GJY</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2022</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=denza" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/denza.png">
    </div>
    <div class="card-info">
        <h3>DENZA D9</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 188 BUD</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2024</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=camry" class="card fade-up" data-status="maintenance">
    <div class="card-img">
        <img src="images/camry.png">
    </div>
    <div class="card-info">
        <h3>CAMRY</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 333 NYE</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2021</span>
        </div>
        <div class="status">
            <img src="images/maintenance.png">
            <span style="color:#071D63;">Maintenance</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=gclass" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/gclass.png">
    </div>
    <div class="card-info">
        <h3>G CLASS</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 123 YRH</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2023</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=ionic" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/ionic.png">
    </div>
    <div class="card-info">
        <h3>IONIC 5</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 111 NTH</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2024</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=zenix" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/zenix.png">
    </div>
    <div class="card-info">
        <h3>ZENIX</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 333 SBI</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2023</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=audi" class="card fade-up" data-status="maintenance">
    <div class="card-img">
        <img src="images/audi.png">
    </div>
    <div class="card-info">
        <h3>AUDI</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 444 RYY</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2022</span>
        </div>
        <div class="status">
            <img src="images/maintenance.png">
            <span style="color:#071D63;">Maintenance</span>
        </div>
    </div>
</a>


<a href="detailmobil.php?mobil=sclass" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/sclass.png">
    </div>
    <div class="card-info">
        <h3>S CLASS</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 333 KNG</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2023</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>

</div>
</div>
<script src="peminjamanmobil.js"></script>

</body>
</html>