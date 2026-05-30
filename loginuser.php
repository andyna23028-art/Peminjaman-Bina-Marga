<?php

session_start();
include 'koneksi.php';
$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $nip = $_POST['nip'];

    $password = md5($_POST['password']);

    // =========================================
    // CEK ADMIN
    // =========================================

    $cekAdmin = mysqli_query($conn,

    "SELECT * FROM admin
    WHERE username='$username'
    AND nip='$nip'
    AND password='$password'");

    if(mysqli_num_rows($cekAdmin) > 0){

        $dataAdmin = mysqli_fetch_assoc($cekAdmin);

        $_SESSION['admin'] = $dataAdmin['id_admin'];

        $_SESSION['username_admin']
        = $dataAdmin['username'];

        header('Location: dashboard.php');

        exit;
    }

    // =========================================
    // CEK USER
    // =========================================

    $cekUser = mysqli_query($conn,

    "SELECT * FROM user
    WHERE username='$username'
    AND nip='$nip'
    AND password='$password'");

    if(mysqli_num_rows($cekUser) > 0){

        $dataUser = mysqli_fetch_assoc($cekUser);

        $_SESSION['id_user']
        = $dataUser['id_user'];

        $_SESSION['username_user']
        = $dataUser['username'];

        header('Location: berandaafterlog.php');

        exit;
    }

    // =========================================
    // LOGIN GAGAL
    // =========================================

    $error = "Username, NIP, atau Password salah";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

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
    font-size: 15px;
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

.register-text {
    margin-top: 12px;
    font-size: 12px;
    color: #666;
}

.register-text a {
    color: #071D63;
    font-weight: bold;
    text-decoration: none;
}

.register-text a:hover {
    text-decoration: underline;
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

    <div class="top-item">
        binamargajawatimur@gmail.com
    </div>

    <div class="top-item">
        WA : +62-7343-8347
    </div>

    <div class="top-item">
        No. Telp : +627343-82
    </div>

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

        <h2>
            Welcome back! Please log in to continue
        </h2>

        <div class="subtitle">
            Please enter your data to continue
        </div>

        <form method="POST">

        <input
    type="text"
    name="username"
    placeholder="Username"
    required
>

        <input
                type="text"
                name="nip"
                placeholder="NIP"
                required
            >

            
            <div class="note">
                <img src="images/peringatan.png" alt="warning">
                <span>Password minimal 8 karakter</span>
            </div>

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button
                type="submit"
                name="login"
                class="btn">
                LOGIN
            </button>

        </form>

        
        <div class="register-text">
            Don’t have an account?
            <a href="registeruser.php">
                Register now
            </a>
        </div>

        <?php if (!empty($error)) : ?>
            <div class="message">
                <?= $error ?>
            </div>
        <?php endif; ?>

    </div>

</div>

<script src="loginuser.js"></script>

</body>
</html>