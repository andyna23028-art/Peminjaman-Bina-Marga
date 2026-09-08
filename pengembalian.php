<?php
session_start();
require_once 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

$id = intval($_POST['id_peminjaman']);

$data = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE id_peminjaman='$id'
"));

if(!$data){
    die("Data tidak ditemukan");
}

/*
|----------------------------------
| Ubah status peminjaman
|----------------------------------
*/
mysqli_query($conn,"
UPDATE peminjaman
SET status_pengajuan='Dikembalikan'
WHERE id_peminjaman='$id'
");

/*
|----------------------------------
| Kembalikan status aset
|----------------------------------
*/

if($data['jenis_aset'] == 'Mobil' || $data['jenis_aset'] == 'Motor'){

    mysqli_query($conn,"
    UPDATE kendaraan
    SET status='Tersedia'
    WHERE id_kendaraan='".$data['id_aset']."'
    ");

}else{

    mysqli_query($conn,"
    UPDATE ruangan
    SET status='Tersedia'
    WHERE id_ruangan='".$data['id_aset']."'
    ");
}

header("Location: profile.php?page=status");
exit;
?>