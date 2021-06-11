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
    <title>Registrasi</title>
    <style>
        *{
    padding: 0;
    margin: 0;
}
body{
    background-image: url('img/background.jpg');
    background-size: cover;
}
form{
    position: fixed;
    top: 5%;
    left: 30%;
    width: 35%;
    height: 90%;
    background-color: #fff;
    border-radius: 6px;
    text-align: center;
}

.header{
    font-family: lobster;
    padding: 30px 0 30px 0;
    background-color: rgb(27, 26, 26);
    font-size: 30px;
    text-align: center;
    color: white;
    border-radius: 6px 6px 0 0;
    margin-bottom: 50px;
}

.container input{
    width: 350px;
    height: 50px;
    margin-bottom: 8px;
    padding-left: 20px;
    border-radius: 5px;
    border: none;
    background-color: #eee;
}
input.cb_agree{
    margin-top: 45px;
    margin-left:-130px;
}
.bt_signup{
    margin-top: 10px;
    margin-bottom: 15px;
    width: 370px;
    height: 50px;
    background-color: #19B5FE;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 18px;
    text-decoration:none;
}
.btn{
    
    margin:10px auto;
    width:90px;
}
.btn a{
    font-weight:400px;
    text-decoration:none;
}
.acount{
    text-decoration:none;
}
    </style>
</head> 
<body>

    <form method="POST">
        <div class="header">User Registrasi</div>

        <div class="container">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <br>
            <select name="id_role" style="width: 76%; padding: 10px">
                <option value="">- Pilih -</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        

        <button type="submit" name="bt_signup" class="bt_signup">Sign Up</button>
        <br>
        <a href="login.php" class="acount">Sudah Punya Akun ?</a>
        <div class="btn"><a href="../../LandingPage/index.html">Kembali</a></div>
    </form>

    <?php

        if (isset($_POST['bt_signup'])) {
            
            $email = $_POST['email'];
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm_password = $_POST['confirm_password'];
            $id_role = $_POST['id_role'];

            $result = $con->query("SELECT email FROM tb_login WHERE email = '$email'");

            if (mysqli_fetch_assoc($result) > 0) {
                echo "<script>alert('Email Sudah Terdaftar');</script>";
            }

            if ($password !== $confirm_password) {
                echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";

            }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = $con->query("INSERT INTO tb_login VALUES('', '$email', '$password', '$id_role')");

            if ($query != 0) {
                echo "<script>alert('Berhasil');</script>";
                echo "<script>window.location.replace('login.php');</script>";
            } else {
                echo "<script>alert('Gagal');</script>";
                echo "<script>window.location.replace('register.php');</script>";
            }
        
        } 

        ?>

</body>
</html>