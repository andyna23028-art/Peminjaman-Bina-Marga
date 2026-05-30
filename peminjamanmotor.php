<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman Motor</title>

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
        <h1 class="fade-up">Ajukan Peminjaman Motor Dinas<br>dengan Mudah dan Cepat</h1>

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

<a href="detailmotor.php?motor=supra" class="card fade-up " data-status="dipinjam">
    <div class="card-img">
        <img src="images/supra.png">
    </div>
    <div class="card-info">
        <h3>SUPRA 125</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 276 TYN</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2020</span>
        </div>
        <div class="status">
    <img src="images/dipinjam.png">
    <span style="color:red;">Dipinjam</span>
</div>
    </div>
</a>


<a href="detailmotor.php?motor=vario" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/vario.png">
    </div>
    <div class="card-info">
        <h3>VARIO 120</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 736 NDU</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2019</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailmotor.php?motor=nmax" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/nmax.png">
    </div>
    <div class="card-info">
        <h3>NMAX</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 191 BNA</span>
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


<a href="detailmotor.php?motor=pcx" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/pcx.png">
    </div>
    <div class="card-info">
        <h3>PCX 160</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 837 NHD</span>
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


<a href="detailmotor.php?motor=beat" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/beat.png">
    </div>
    <div class="card-info">
        <h3>BEAT EsP</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 837 KSD</span>
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


<a href="detailmotor.php?motor=scoopy" class="card fade-up" data-status="maintenance">
    <div class="card-img">
        <img src="images/scoopy.png">
    </div>
    <div class="card-info">
        <h3>SCOOPY</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 326 KSJ</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2025</span>
        </div>
        <div class="status">
            <img src="images/maintenance.png">
            <span style="color:#071D63;">Maintenance</span>
        </div>
    </div>
</a>


<a href="detailmotor.php?motor=verza" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/verza.png">
    </div>
    <div class="card-info">
        <h3>VERZA</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 539 YDB</span>
        </div>
        <div class="meta">
            <img src="images/logo tahun.png">
            <span>2025</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailmotor.php?motor=cb" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/cb150r.png">
    </div>
    <div class="card-info">
        <h3>CB 150 R</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 736 NXU</span>
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


<a href="detailmotor.php?motor=vixion" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/vixion.png">
    </div>
    <div class="card-info">
        <h3>VIXION</h3>
        <div class="meta">
            <img src="images/plat.png">
            <span>L 983 NMJ</span>
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

</div>
</div>
<script src="peminjamanmotor.js"></script>

</body>
</html>