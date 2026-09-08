<?php
include 'koneksi.php';

if(isset($_GET['hapus'])){

    $id = (int)$_GET['hapus'];

    mysqli_query(
        $conn,
        "DELETE FROM user WHERE id_user = $id"
    );

}

header("Location: kelolauser.php");
exit;
?>