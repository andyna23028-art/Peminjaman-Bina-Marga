<?php
session_start();
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_user          = $_SESSION['id_user'];
    $qUser = mysqli_query($conn,"
    SELECT username
    FROM user
    WHERE id_user='$id_user'
    ");

    $user = mysqli_fetch_assoc($qUser);
    $username = $user['username'];
    $jenis_aset       = $_POST['jenis_aset'];
    $id_aset          = $_POST['id_aset'];
    $tanggal_mulai    = $_POST['tanggal_mulai'];
    $tanggal_selesai  = $_POST['tanggal_selesai'];
    $jam_mulai        = $_POST['jam_mulai'];
    
    // Ambil nama aset
    if($jenis_aset == "Ruangan"){

        $q = mysqli_query($conn,"
            SELECT nama, kode
            FROM ruangan
            WHERE id = '$id_aset'
        ");

    }else{

        $q = mysqli_query($conn,"
            SELECT nama, plat, tipe
            FROM kendaraan
            WHERE id_kendaraan = '$id_aset'
        ");

    }

    $aset = mysqli_fetch_assoc($q);
    $nama_aset = $aset['nama'];
    $plat = '';
    $tipe = '';
    $kode = '';

    if($jenis_aset == "Ruangan"){

        $kode = $aset['kode'];

    }else{

        $plat = $aset['plat'];
        $tipe = $aset['tipe'];

    }


    $sql = "
    INSERT INTO peminjaman (
        id_user,
        username,
        jenis_aset,
        id_aset,
        nama,
        plat,
        tipe,
        kode,
        tanggal_mulai,
        tanggal_selesai,
        jam_mulai,
        status_pengajuan
    )
    VALUES (
        '$id_user',
        '$username',
        '$jenis_aset',
        '$id_aset',
        '$nama_aset',
        '$plat',
        '$tipe',
        '$kode',
        '$tanggal_mulai',
        '$tanggal_selesai',
        '$jam_mulai',
        'Diproses'
    )";

    if(mysqli_query($conn,$sql)){

        header("Location: detailmobil.php?id=".$id_aset."&success=1");
        exit;

    }else{

        echo mysqli_error($conn);

    }

}
?>