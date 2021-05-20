<?php
    session_start();

    if (isset($_SESSION['login'])) {
        echo "<script>alert('Logout Dahulu');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }

    include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan Login </p>

        <form action="" method="POST">
            <label for="">Username</label>
            <input type="text" name="username" class="form_login">
            
            <label for="">Password</label>
            <input type="password" name="password" class="form_login">

            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" class="form_login">

            <input type="submit" name="btn-register" class="tombol_login" value="REGISTER">
        </form>
    </div>

    <?php

        if (isset($_POST['btn-register'])) {
            
            $username = $_POST['username'];
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm_password = $_POST['confirm_password'];
 
            $result = $con->query("SELECT username FROM tb_login WHERE username = '$username' ");

            if (mysqli_fetch_assoc($result) > 0) {
                echo "<script>alert('Username Sudah Terdaftar');</script>";
            }

            if ($password !== $confirm_password) {
                echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";

            }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = $con->query("INSERT INTO tb_login VALUES('', '$username', '$password')");

            if ($query != 0) {
                echo "<script>alert('Berhasil');</script>";
                echo "<script>window.location.replace('register.php');</script>";
            } else {
                echo "<script>alert('Gagal');</script>";
                echo "<script>window.location.replace('register.php');</script>";
            }
        
        } 

        ?>

</body>
</html>