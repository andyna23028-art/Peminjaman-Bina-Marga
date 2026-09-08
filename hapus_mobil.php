<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT gambar
         FROM kendaraan
         WHERE id_kendaraan='$id'"
    )
);

if(file_exists($data['gambar'])){
    unlink($data['gambar']);
}

mysqli_query(
    $conn,
    "DELETE FROM kendaraan
     WHERE id_kendaraan='$id'"
);

header("Location: kelolamobil.php");
exit;