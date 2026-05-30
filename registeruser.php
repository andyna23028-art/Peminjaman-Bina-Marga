<?php

session_start();
include 'koneksi.php';

$error = "";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $nip = $_POST['nip'];
    $no_hp = $_POST['no_hp'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE nip='$nip'");

    if(mysqli_num_rows($cek) > 0){
        $error = "NIP sudah digunakan";
    } else {

        $query = mysqli_query($conn,
        "INSERT INTO user(username,nip,no_hp,password)
        VALUES('$username','$nip','$no_hp','$password')");

        if($query){
            header("Location: loginuser.php");
            exit;
        } else {
            $error = mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register</title>

<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background: #eaeaea;
    overflow-x: hidden;
}

.top-bar {
    width: 85%;
    margin: 25px auto;
    background: #071D63;
    color: white;
    padding: 14px 25px;
    border-radius: 50px;

    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1fr;
    align-items: center;
}

.top-item {
    text-align: center;
    font-size: 13px;
    border-right: 1px solid rgba(255,255,255,0.2);
    padding: 0 10px;
}

.top-item:last-child {
    border-right: none;
}

.social {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.social img {
    width: 18px;
    height: 18px;
    cursor: pointer;
    transition: 0.3s;
    filter: brightness(0) invert(1);
}

.social img:hover {
    transform: scale(1.2);
}

.background {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: -1;

    background-image:
        url('images/logo.png'),
        url('images/maskot.png');

    background-repeat: no-repeat, no-repeat;
    background-position: left 40px center, right 60px center;
    background-size: 500px, 520px;

    filter: contrast(120%) saturate(130%);
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

.card {
    width: 360px;
    background: rgba(255,255,255,0.95);
    border: 2px solid #FED000;
    border-radius: 12px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

.card h2 {
    font-size: 16px;
    line-height: 1.3;
}

.subtitle {
    font-size: 13px;
    color: #333;
    margin-bottom: 15px;
}

input {
    width: 100%;
    padding: 12px;
    margin-top: 12px;
    border: none;
    border-radius: 8px;
    background: #071D63;
    color: white;
}

input::placeholder {
    color: #bbb;
}

input:focus {
    outline: none;
}

.note {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 10px;
    font-size: 11px;
    color: #777;
}

.note img {
    width: 12px;
    height: 12px;
}

.btn {
    margin-top: 15px;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #FED000;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: #e6c200;
    transform: translateY(-2px);
}

.message {
    margin-top: 10px;
    color: red;
    font-size: 13px;
}

@media(max-width:768px){

    .top-bar{
        display: flex;
        flex-direction: column;
        width: 90%;
        gap: 10px;
        text-align: center;
        border-radius: 20px;
        padding: 15px;
    }

    .top-item{
        border: none;
        font-size: 12px;
    }

    .social{
        justify-content: center;
    }

    .container{
        height: auto;
        padding: 50px 20px;
    }

    .card{
        width: 90%;
        max-width: 380px;
        padding: 22px;
    }

    .background{
        background-size: 250px, 260px;
        background-position: left -80px bottom, right -80px top;
        opacity: 0.2;
    }
}

@media(max-width:480px){

    .card{
        width: 95%;
        padding: 18px;
    }

    .background{
        display: none;
    }
}

</style>
</head>

<body>

<div class="background"></div>

<div class="top-bar">
    <div class="top-item">binamargajawatimur@gmail.com</div>
    <div class="top-item">WA : +62-7343-8347</div>
    <div class="top-item">No. Telp : +627343-82</div>

    <div class="top-item social">

        <a href="https://x.com/dbmjatim" target="_blank">
            <img src="images/twitter.png">
        </a>

        <a href="https://www.instagram.com/binamargajatim" target="_blank">
            <img src="images/instagram.png">
        </a>

        <a href="https://www.youtube.com/channel/UChGZiOkcah5NwxlTUqFm9ZQ" target="_blank">
            <img src="images/youtube.png">
        </a>

        <a href="https://www.facebook.com/binamargajatimprov" target="_blank">
            <img src="images/facebook.png">
        </a>

    </div>
</div>

<div class="container">

    <div class="card">

        <h2>Create an account</h2>

        <div class="subtitle">
            Fill in your data to get started
        </div>

       <form method="POST">

   <input type="text" name="username" placeholder="Username" required>

    <input type="text" name="nip" placeholder="NIP" required>

    <input type="text" name="no_hp" placeholder="No Handphone" required>

    <div class="note">
        <img src="images/peringatan.png">
        <span>Password minimal 8 karakter</span>
    </div>

    <input type="password" name="password" placeholder="Password" required>

    <button
        type="submit"
        name="register"
        class="btn">
        DAFTAR
    </button>

</form>


        <?php if (!empty($error)) : ?>
            <div class="message">
                <?= $error ?>
            </div>
        <?php endif; ?>

    </div>

</div>

<script src="registeruser.js"></script>

</body>
</html>