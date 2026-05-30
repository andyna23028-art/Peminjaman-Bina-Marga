<?php
$mobil = $_GET['mobil'] ?? 'porsche';

$data = [
    "porsche" => ["nama" => "PORSCHE 911", "plat" => "L 333 NTO", "tahun" => "2025", "warna" => "Hitam", "tipe" => "Sport", "gambar" => "images/porsche.png", "status" => "tersedia"],
    "reborn" => ["nama" => "INNOVA REBORN", "plat" => "L 000 GJY", "tahun" => "2022", "warna" => "Putih", "tipe" => "MPV", "gambar" => "images/reborn.png", "status" => "dipinjam"],
    "denza" => ["nama" => "DENZA D9", "plat" => "L 188 BUD", "tahun" => "2024", "warna" => "Abu-abu", "tipe" => "Electric", "gambar" => "images/denza.png", "status" => "tersedia"],
    "camry" => ["nama" => "CAMRY", "plat" => "L 333 NYE", "tahun" => "2021", "warna" => "Hitam", "tipe" => "Sedan", "gambar" => "images/camry.png", "status" => "maintenance"],
    "gclass" => ["nama" => "G CLASS", "plat" => "L 123 YRH", "tahun" => "2023", "warna" => "Hitam", "tipe" => "SUV", "gambar" => "images/gclass.png", "status" => "tersedia"],
    "ionic" => ["nama" => "IONIC 5", "plat" => "L 111 NTH", "tahun" => "2024", "warna" => "Putih", "tipe" => "Electric", "gambar" => "images/ionic.png", "status" => "tersedia"],
    "zenix" => ["nama" => "ZENIX", "plat" => "L 333 SBI", "tahun" => "2023", "warna" => "Silver", "tipe" => "Hybrid", "gambar" => "images/zenix.png", "status" => "dipinjam"],
    "audi" => ["nama" => "AUDI", "plat" => "L 444 RYY", "tahun" => "2022", "warna" => "Hitam", "tipe" => "Sedan", "gambar" => "images/audi.png", "status" => "maintenance"],
    "sclass" => ["nama" => "S CLASS", "plat" => "L 333 KNG", "tahun" => "2023", "warna" => "Hitam", "tipe" => "Luxury", "gambar" => "images/sclass.png", "status" => "dipinjam"]
];
$m = $data[$mobil] ?? $data['porsche'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil - <?= $m['nama'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #e6e6e6; color: #333; overflow-x: hidden; }


.topbar {
    background: #2b2b2b;
    color: white;
    padding: 16px 0;
}

.topbar-container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 90px;
    font-size: 14px;
}

.divider {
    width: 1px;
    height: 14px;
    background: #aaa;
}

.top-item.social {
    display: flex;
    gap: 15px;
}

.top-item.social img {
    width: 20px;     
    height: 20px;   
    object-fit: contain;
    opacity: 0.85;
    transition: 0.3s ease;
}

.top-item.social img:hover {
    opacity: 1;
    transform: scale(1.15); 
}


        .header { background: #fff; padding: 15px 60px; display: flex; align-items: center; border-bottom: 1px solid #ddd; }
        .header img { width: 50px; margin-right: 15px; }
        .header-text { font-size: 14px; font-weight: 700; color: #1a2c6b; line-height: 1.2; }

        .back-link { display: flex; align-items: center; padding: 20px 60px; text-decoration: none; color: #ff3b30; font-weight: 700; font-size: 15px; }
        .back-link img { width: 22px; margin-right: 8px; }



       
        .main-container { display: flex; padding: 0 60px 60px; align-items: flex-start; justify-content: space-between; }
        .car-display { width: 55%; text-align: center; }
        .car-display img { width: 100%; max-width: 600px; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.2)); }
        .car-name-box { margin-top: 5px; background: #fff; display: inline-block; padding: 12px 60px; border-radius: 10px; font-weight: 800; font-size: 24px; color: #1a2c6b; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }

        .details-section { width: 38%; }
        .details-section h1 { font-size: 28px; font-weight: 700; margin-bottom: 20px; text-align: center; }
        .specs-box { background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .spec-row { display: flex; justify-content: space-between; padding: 10px 0; font-size: 14px; border-bottom: 1px solid #f0f0f0; }
        .spec-label { font-weight: 700; color: #000; }
        
        .btn-pinjam { width: 100%; background: #1a2c6b; color: #fff; border: none; padding: 18px; border-radius: 12px; font-weight: 700; font-size: 20px; margin-top: 25px; cursor: pointer; text-transform: uppercase; transition: 0.3s; }
        .btn-pinjam:hover { background: #253d8c; transform: translateY(-3px); }

       
        #overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.7); display: none; align-items: center; justify-content: center; z-index: 1000; padding: 20px; }
        #overlay.active { display: flex; }

        .modal { background: #fff; width: 100%; max-width: 620px; max-height: 100vh; border-radius: 20px; padding: 30px; position: relative; display: flex; flex-direction: column; overflow-y: auto; }
        .modal h2 { font-size: 20px; color: #1a2c6b; margin-bottom: 10px; text-align: center; font-weight: 700; }
        .line-gradient { height: 5px; background: linear-gradient(90deg, #f1c40f, #1a2c6b); border-radius: 10px; margin-bottom: 20px; }

        .calendars-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }
        .cal-title { font-size: 14px; font-weight: 700; color: #1a2c6b; margin-bottom: 8px; text-align: center; }
        
        .mini-cal { border: 1px solid #eee; border-radius: 12px; padding: 10px; font-size: 11px; }
        .cal-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; color: #1a2c6b; font-weight: 800; }
        .cal-head span { cursor: pointer; padding: 5px; border-radius: 50%; transition: 0.2s; }
        .cal-head span:hover { background: #f0f0f0; }

        .cal-days { display: grid; grid-template-columns: repeat(7, 1fr); gap: 3px; margin-bottom: 5px; }
        .cal-days span { background: #f1c40f; padding: 4px 0; border-radius: 4px; font-weight: 700; text-align: center; color: #fff; }
        
        .cal-dates { display: grid; grid-template-columns: repeat(7, 1fr); gap: 3px; text-align: center; }
        .cal-dates div { padding: 8px 0; cursor: pointer; border-radius: 6px; transition: 0.2s; font-weight: 500; }
        
.back-link {
    display: flex;
    align-items: center;
    padding: 20px 60px;
    text-decoration: none;
    color: #ff3b30;
    font-weight: 700;
    font-size: 15px;
    transition: all 0.3s ease;
}


.back-link img {
    width: 22px;
    margin-right: 8px;
    transition: transform 0.3s ease;
}


.back-link:hover {
    color: #d92c23;
    transform: translateX(-5px); 
}


.back-link:hover img {
    transform: translateX(-5px);
}

        
        .cal-dates div:not(.empty):hover { background: rgba(241, 196, 15, 0.3); color: #000; }
        .cal-dates div.selected { background: #1a2c6b !important; color: #fff !important; font-weight: 700; }
        .cal-dates div.empty { color: #ccc; cursor: default; }

        .time-header { display: flex; align-items: center; gap: 10px; margin: 8px 0 5px; }
        .time-header h3 { font-size: 14px; font-weight: 700; color: #1a2c6b; }
        .time-line { flex-grow: 1; height: 2px; background: #ddd; }

        .time-select { width: 100%; padding: 12px 15px; background: #f1c40f; border: none; border-radius: 10px; font-weight: 700; color: #fff; appearance: none; cursor: pointer; margin-bottom: 75px; }

        .modal-footer { display: flex; justify-content: space-between; gap: 10px; margin-top: 10px; }
        .btn-batal { flex: 1; background: #ff3b30; color: white; padding: 12px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; }
        .btn-ajukan { flex: 1; background: #1a2c6b; color: white; padding: 12px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; text-decoration: none; text-align: center; }


.btn-batal:hover {
    background: #e02e24;
    transform: scale(1.05);
}

.btn-ajukan:hover {
    background: #253d8c;
    transform: scale(1.05);
}


#successPopup {
    position: fixed;
    inset: 0;
    background: #f5f5f5;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
    animation: fadeIn 0.4s ease;
}

#successPopup.active {
    display: flex;
}

.success-content {
    text-align: center;
    max-width: 800px;
}

.success-content img {
    width: 300px;
    margin-bottom: 20px;
}

.success-content h1 {
    font-size: 40px;
    color: #1a2c6b;
    margin-bottom: 10px;
}

.success-content p {
    color: #555;
    margin-bottom: 40px;
}

.success-buttons {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 50px; 
}

.btn-status {
    background: #f1c40f;
    padding: 15px 30px;
    border-radius: 15px;
    font-weight: 700;
    text-decoration: none;
    color: #1a2c6b;
    transition: 0.3s;
}

.btn-home {
    background: #1a2c6b;
    padding: 15px 30px;
    border-radius: 15px;
    font-weight: 700;
    text-decoration: none;
    color: white;
    transition: 0.3s;
}

.btn-status:hover {
    transform: scale(1.08);
    background: #e0b90c;
}

.btn-home:hover {
    transform: scale(1.08);
    background: #253d8c;
}


@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}


#maintenancePopup, #popupDipinjam {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
}

#maintenancePopup.active, #popupDipinjam.active {
    display: flex;
}


.maintenance-box, .dipinjam-box {
    background: #f2f2f2;
    width: 500px;
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    animation: fadeIn 0.3s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.maintenance-box img, .dipinjam-box img {
    width: 250px;
    margin-bottom: 20px;
}


.maintenance-text h2, .dipinjam-content h1 {
    font-size: 24px;
    color: #1a2c6b;
    font-weight: 700;
    margin-bottom: 15px;
}

.maintenance-text p, .dipinjam-content p {
    font-size: 15px;
    color: #444;
    line-height: 1.6;
    margin-bottom: 25px;
}


.btn-pilih-lain {
    display: inline-block;
    background: #0a1d56;
    color: #fff;
    text-decoration: none;
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 16px;
    transition: all 0.3s ease;
}

.btn-pilih-lain:hover {
    background: #1a2c6b;
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}


.close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 22px;
    cursor: pointer;
    color: #1a2c6b;
    font-weight: bold;
}


    </style>
</head>
<body>

<div class="topbar">
    <div class="topbar-container">

        <span>binamargajawatimur@gmail.com</span>
        <div class="divider"></div>

        <span>WA: +62-7343-8347</span>
        <div class="divider"></div>

        <span>WA: +627343-82</span>
        <div class="divider"></div>

        <div class="top-item social">
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
</div>

    <header class="header">
        <img src="images/logobina.png" alt="Logo">
        <div class="header-text">DINAS PEKERJAAN UMUM BINA MARGA<br>PROVINSI JAWA TIMUR</div>
    </header>

    <a href="peminjamanmobil.php" class="back-link"><img src="images/kembali.png" alt="Back"> Kembali</a>

    <div class="main-container">
        <div class="car-display">
            <img src="<?= $m['gambar'] ?>" alt="Mobil">
            <div class="car-name-box"><?= $m['nama'] ?></div>
        </div>
        <div class="details-section">
            <h1>Deskripsi & Spesifikasi</h1>
            <div class="specs-box">
                <div class="spec-row"><span class="spec-label">Nama</span> <span><?= $m['nama'] ?></span></div>
                <div class="spec-row"><span class="spec-label">Plat</span> <span><?= $m['plat'] ?></span></div>
                <div class="spec-row"><span class="spec-label">Tipe</span> <span><?= $m['tipe'] ?></span></div>
                <div class="spec-row"><span class="spec-label">Tahun</span> <span><?= $m['tahun'] ?></span></div>
            </div>
            <button class="btn-pinjam" onclick="handleAction('<?= $m['status'] ?>')">
    Pinjam Sekarang
</button>
        </div>
    </div>

    <div id="overlay">
        <div class="modal">
            <h2>Tentukan Tanggal Peminjaman</h2>
            <div class="line-gradient"></div>

            <div class="calendars-grid">
                <div class="cal-wrapper">
                    <p class="cal-title">Tanggal Mulai</p>
                    <div class="mini-cal" id="cal-start">
                        <div class="cal-head">
                            <span onclick="changeMonth('start', -1)">❮</span>
                            <b class="month-name"></b>
                            <span onclick="changeMonth('start', 1)">❯</span>
                        </div>
                        <div class="cal-days"><span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span></div>
                        <div class="cal-dates"></div>
                    </div>
                </div>
                <div class="cal-wrapper">
                    <p class="cal-title">Tanggal Selesai</p>
                    <div class="mini-cal" id="cal-end">
                        <div class="cal-head">
                            <span onclick="changeMonth('end', -1)">❮</span>
                            <b class="month-name"></b>
                            <span onclick="changeMonth('end', 1)">❯</span>
                        </div>
                        <div class="cal-days"><span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span></div>
                        <div class="cal-dates"></div>
                    </div>
                </div>
            </div>

            <div class="time-header">
                <h3>Waktu Mulai</h3>
                <div class="time-line"></div>
            </div>
           <select class="time-select">
    <option selected disabled>Pilih waktu yang tersedia</option>
    <option value="09:00">09.00</option>
    <option value="10:00">10.00</option>
    <option value="13:00">13.00</option>
    <option value="14:00">14.00</option>
</select>

            <div class="modal-footer">
                <button class="btn-batal" onclick="toggleModal(false)">Batal</button>
                <button class="btn-ajukan" onclick="showSuccess()">Ajukan</button>
            </div>
        </div>
    </div>

   
<div id="successPopup">
    <div class="success-content">
        <img src="images/pengajuan.png" alt="Sukses">

        <h1>Pengajuan Terkirim</h1>
        <p>Data peminjaman telah tersimpan dan sedang dalam proses verifikasi.</p>

        <div class="success-buttons">
    <a href="profile.php?page=status" class="btn-status">Status Peminjaman</a>
    <a href="berandaafterlog.php" class="btn-home">Kembali Ke Beranda</a>
</div>

    </div>
</div>
<div id="maintenancePopup">
    <div class="maintenance-box">
        <span class="close-btn" onclick="closeMaintenance()">✕</span>
        <img src="images/maintenancepopup.png" alt="Maintenance">
        <div class="maintenance-text">
            <h2>Sedang Dalam Perawatan</h2>
            <p>
                Aset ini sedang dalam proses perawatan atau perbaikan sehingga
                belum dapat digunakan untuk sementara waktu.
            </p>
            <a href="peminjamanmobil.php" class="btn-pilih-lain">PILIH ASET LAIN</a>
        </div>
    </div>
</div>

<div id="popupDipinjam">
    <div class="dipinjam-box">
        <span class="close-btn" onclick="closeDipinjam()">✕</span>
        <img src="images/dipinjampopup.png" alt="Sedang Dipinjam">
        <div class="dipinjam-content">
            <h1>Sedang Dipinjam</h1>
            <p>
                Aset ini sedang digunakan oleh pengguna lain dan belum tersedia untuk dipinjam saat ini. 
                Silakan pilih aset lain yang tersedia.
            </p>
            <a href="peminjamanmobil.php" class="btn-pilih-lain">PILIH ASET LAIN</a>
        </div>
    </div>
</div>

    <script src="detailmobil.js"></script>
</body>
</html>