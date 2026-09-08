<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE peminjaman
SET status_pengajuan='Diterima'
WHERE id_peminjaman='$id'
");

header("Location: peminjamanberjalan.php");
exit;