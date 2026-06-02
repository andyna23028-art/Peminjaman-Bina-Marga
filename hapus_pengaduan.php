<?php
include 'koneksi.php';

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    mysqli_query(
        $conn,
        "DELETE FROM pengaduan WHERE id_pengaduan='$id'"
    );

}

header("Location: laporanpengaduan.php");
exit;
?>