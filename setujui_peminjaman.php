<?php
include 'koneksi.php';

$id = $_POST['id_peminjaman'];

mysqli_query($conn,"
UPDATE peminjaman
SET status_pengajuan='Disetujui'
WHERE id_peminjaman='$id'
");

echo "success";
?>