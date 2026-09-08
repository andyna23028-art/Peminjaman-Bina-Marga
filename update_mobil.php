<?php

include "koneksi.php";

$id     = $_POST['id_kendaraan'];
$nama   = $_POST['nama'];
$plat   = $_POST['plat'];
$tipe   = $_POST['tipe'];
$tahun  = $_POST['tahun'];
$no_mesin=$_POST['no_mesin'];
$no_rangka=$_POST['no_rangka'];
$status = $_POST['status'];

mysqli_query($conn,"
UPDATE kendaraan SET
nama='$nama',
plat='$plat',
tipe='$tipe',
tahun='$tahun',
no_mesin='$no_mesin',
no_rangka='$no_rangka',
status='$status'
WHERE id_kendaraan='$id'
");

header("Location: kelolamobil.php");
exit;