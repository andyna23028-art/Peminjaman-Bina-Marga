<?php

include "koneksi.php";

$id         = $_POST['id'];
$nama       = mysqli_real_escape_string($conn, $_POST['nama']);
$lantai     = mysqli_real_escape_string($conn, $_POST['lantai']);
$kode       = mysqli_real_escape_string($conn, $_POST['kode']);
$kapasitas  = mysqli_real_escape_string($conn, $_POST['kapasitas']);
$status     = mysqli_real_escape_string($conn, $_POST['status']);

mysqli_query(
    $conn,
    "
    UPDATE ruangan SET
    nama='$nama',
    lantai='$lantai',
    kode='$kode',
    kapasitas='$kapasitas',
    status='$status',
    last_edit=NOW()
    WHERE id='$id'
    "
);

header("Location: kelolaruangan.php");
exit;