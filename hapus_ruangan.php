<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "
        SELECT gambar
        FROM ruangan
        WHERE id='$id'
        "
    )
);

if (
    !empty($data['gambar']) &&
    file_exists($data['gambar'])
) {
    unlink($data['gambar']);
}

mysqli_query(
    $conn,
    "
    DELETE FROM ruangan
    WHERE id='$id'
    "
);

header("Location: kelolaruangan.php");
exit;