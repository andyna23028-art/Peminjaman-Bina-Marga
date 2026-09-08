<?php

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: kelolamobil.php");
    exit;
}


$kategori = $_POST['kategori'];
$nama     = mysqli_real_escape_string(
                $conn,
                $_POST['nama']
            );

$plat     = mysqli_real_escape_string(
                $conn,
                $_POST['plat']
            );

$tipe     = mysqli_real_escape_string(
                $conn,
                $_POST['tipe']
            );

$tahun = $_POST['tahun'];

$no_mesin = mysqli_real_escape_string(
    $conn,
    $_POST['no_mesin']
);

$no_rangka = mysqli_real_escape_string(
    $conn,
    $_POST['no_rangka']
);

$status = $_POST['status'];


if (!isset($_FILES['gambar']) ||
    $_FILES['gambar']['error'] != 0) {

    die("Gambar wajib diupload.");
}

$allowed = [
    'jpg',
    'jpeg',
    'png'
];

$ext = strtolower(
    pathinfo(
        $_FILES['gambar']['name'],
        PATHINFO_EXTENSION
    )
);

if (!in_array($ext, $allowed)) {

    die(
        "Format gambar harus JPG, JPEG, atau PNG."
    );
}

if ($_FILES['gambar']['size'] >
    2 * 1024 * 1024) {

    die(
        "Ukuran gambar maksimal 2 MB."
    );
}


$folder = "uploads/";

if (!is_dir($folder)) {

    mkdir(
        $folder,
        0777,
        true
    );
}

$namaFile =
    time() .
    "_" .
    preg_replace(
        '/[^a-zA-Z0-9._-]/',
        '',
        $_FILES['gambar']['name']
    );

$path = $folder . $namaFile;

if (
    !move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        $path
    )
) {

    die("Upload gambar gagal.");
}


$sql = "
INSERT INTO kendaraan
(
    kategori,
    nama,
    plat,
    tipe,
    tahun,
    no_mesin,
    no_rangka,
    status,
    gambar
)
VALUES
(
    '$kategori',
    '$nama',
    '$plat',
    '$tipe',
    '$tahun',
    '$no_mesin',
    '$no_rangka',
    '$status',
    '$path'
)
";

$query = mysqli_query(
    $conn,
    $sql
);

if (!$query) {

    die(
        "Gagal menyimpan data: " .
        mysqli_error($conn)
    );
}


header(
    "Location: kelolamotor.php"
);
exit;