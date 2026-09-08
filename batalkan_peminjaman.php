<?php
session_start();
include 'koneksi.php';

if(isset($_POST['id_peminjaman'])){

    $id_peminjaman = $_POST['id_peminjaman'];
    $id_user = $_SESSION['id_user'];

    mysqli_query($conn,"
        UPDATE peminjaman
        SET status_pengajuan='Dibatalkan'
        WHERE id_peminjaman='$id_peminjaman'
        AND id_user='$id_user'
    ");
}

header("Location: profile.php?page=status");
exit;
?>