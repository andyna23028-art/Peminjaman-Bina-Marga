<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id_pengaduan'];
    $status = $_POST['status'];

    mysqli_query(
        $conn,
        "UPDATE pengaduan
         SET status='$status'
         WHERE id_pengaduan='$id'"
    );

}

header("Location: laporanpengaduan.php");
exit;
?>