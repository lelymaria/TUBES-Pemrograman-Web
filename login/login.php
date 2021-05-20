<?php
    session_start();

        if (isset($_SESSION['login'])) {
            echo "<script>alert('logout dahulu');</script>";
            echo "<script>window.location.replace('index.php');</script>";
            exit;
    }

    include 'config/koneksi.php'
?>

    <?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * from tb_login where username = '$username'");
    
        if (mysqli_num_rows($result) === 1) {

            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                echo "<script>alert('Berhasil Login');</script>";
                echo "<script>window.location.replace('index.php');</script>";
            }else{
                echo "<script>alert('Gagal  Login');</script>";
                echo "<script>window.location.replace('index.php');</script>";
            }
        }else{
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 style="margin: 40px;">Login</h1>
        <form method="POST">
            <label>Username</label><br>
            <input type="text" name="username" style="background-color: #0EA7F3;"><br>
            <label>Password</label><br>
            <input type="password" name="password" style="background-color: #0EA7F3;"><br><br>
            <button type="submit" name="btn-login" style="padding: 3px; margin-left: 100px; width: 50%; border-radius: 15px; font-size: 20px; background: gray; color: white; cursor: pointer;" >Login</button>
            <p>belum punya akun? <a href="register.php">register disini</a></p>
        </form>
    </div>
</body>
</html>
    </body>
</html> 