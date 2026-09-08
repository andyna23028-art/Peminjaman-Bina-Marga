<?php
include 'koneksi.php';

$id = $_POST['id_peminjaman'];
$alasan = $_POST['alasan'];

mysqli_query($conn,"
UPDATE peminjaman
SET
status_pengajuan='Ditolak',
alasan_penolakan='$alasan'
WHERE id_peminjaman='$id'
");

echo "success";
?>