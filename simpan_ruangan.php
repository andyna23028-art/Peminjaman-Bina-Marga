<?php
include "koneksi.php";

$nama = $_POST['nama'];
$lantai = $_POST['lantai'];
$kode = $_POST['kode'];
$kapasitas = $_POST['kapasitas'];
$status = $_POST['status'];

/* VALIDASI GAMBAR */
if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {
    die("Gambar wajib diupload");
}

$ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

if (!in_array($ext, ['jpg','jpeg','png'])) {
    die("Format harus JPG/JPEG/PNG");
}

$folder = "uploads/";
if (!is_dir($folder)) mkdir($folder, 0777, true);

$namaFile = time() . "_" . $_FILES['gambar']['name'];
$path = $folder . $namaFile;

move_uploaded_file($_FILES['gambar']['tmp_name'], $path);

/* INSERT KE DATABASE */
$sql = "INSERT INTO ruangan
(nama,lantai,kode,kapasitas,gambar,status, last_edit)
VALUES
('$nama','$lantai','$kode','$kapasitas','$path','$status', NOW())";

$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Error DB: " . mysqli_error($conn));
}

header("Location: kelolaruangan.php");
exit;
?>