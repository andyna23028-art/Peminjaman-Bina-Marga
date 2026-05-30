<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peminjaman Ruang</title>

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
        <h1 class="fade-up">Ajukan Peminjaman Ruang Dinas<br>dengan Mudah dan Cepat</h1>

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

<a href="detailruang.php?ruang=rapatb" class="card fade-up " data-status="tersedia">
    <div class="card-img">
        <img src="images/rapatb.png">
    </div>
    <div class="card-info">
        <h3>R. RAPAT B</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>B.2.130.115</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>40 Orang</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=rapatk" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/rapatk.png">
    </div>
    <div class="card-info">
        <h3>R. RAPAT K</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>A.2.350.225</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>15 Orang</span>
        </div>
         <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=diskusi" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/diskusi.png">
    </div>
    <div class="card-info">
        <h3>R. DISKUSI</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>B.3.131.116</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>10 Orang</span>
        </div>
         <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=avi" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/avi.png">
    </div>
    <div class="card-info">
        <h3>R. AVI</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>C.1.339.467</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>100 Orang</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=web" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/web.png">
    </div>
    <div class="card-info">
        <h3>R. WEB</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>C.2.755.911</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>50 Orang</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=pandhawa" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/pandhawa.png">
    </div>
    <div class="card-info">
        <h3>PANDHAWA</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>A.3.550.458</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>350 Orang</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=tennis" class="card fade-up" data-status="dipinjam">
    <div class="card-img">
        <img src="images/tennis.png">
    </div>
    <div class="card-info">
        <h3>LAP. TENNIS</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>B.1.120.111</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>4 Orang</span>
        </div>
        <div class="status">
            <img src="images/dipinjam.png">
            <span style="color:red;">Dipinjam</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=lab" class="card fade-up" data-status="tersedia">
    <div class="card-img">
        <img src="images/lab.png">
    </div>
    <div class="card-info">
        <h3>LAB</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>A.1.250.222</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>10 Orang</span>
        </div>
        <div class="status">
            <img src="images/tersedia.png">
            <span style="color:#2ecc71;">Tersedia</span>
        </div>
    </div>
</a>


<a href="detailruang.php?ruang=aula" class="card fade-up" data-status="maintenance">
    <div class="card-img">
        <img src="images/aula.png">
    </div>
    <div class="card-info">
        <h3>AULA</h3>
        <div class="meta">
            <img src="images/no.png">
            <span>C.3.321.756</span>
        </div>
        <div class="meta">
            <img src="images/user.png">
            <span>300 Orang</span>
        </div>
        <div class="status">
    <img src="images/maintenance.png">
    <span style="color:#071D63;">Maintenance</span>
</div>
    </div>
</a>

</div>
</div>
<script src="peminjamanruang.js"></script>

</body>
</html>