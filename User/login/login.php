    <?php
    session_start();

    if (isset($_SESSION['user'])) {
        echo "<script>alert('Logout Dahulu');</script>";
        echo "<script>window.location.replace('../index.php');</script>";
    }

    include '../../config/koneksi.php';
    if (isset($_POST["btn_login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * from tb_login where email = '$email'");
    
        if (mysqli_num_rows($result) === 1 ) {
            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {

                if ($data['id_role'] == 2) {

                    $_SESSION['user'] = true;
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['id_role_user'] = true;
    
                    echo "<script>alert('Berhasil Login');</script>";
                    echo "<script>window.location.replace('../index.php');</script>";    
                } else {
                    
                    echo "<script>alert('Gagal ya , gagal ya, gagal lah masa engga wkwk');</script>";
                    echo "<script>window.location.replace('login.php');</script>";

                }
                
            }else{
                echo "<script>alert('Gagal  Login');</script>";
                echo "<script>window.location.replace('login.php');</script>";
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
    <style>
        *{
    padding: 0;
    margin: 0;
}
body{
    background: pink;
}
form{
    position: fixed;
    top: 5%;
    left: 30%;
    width: 35%;
    height: 450px;
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
        <div class="header">
            Login User
        </div>

        <div class="container">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
        </div>

        <button class="bt_signup" name="btn_login">Sign In</button>
        <br>
        <a href="register.php" class="acount">Belum Punya Akun ?</a>
        <div class="btn"><a href="../../LandingPage/index.html">Kembali</a></div>
    </form>
</body>
</html>
