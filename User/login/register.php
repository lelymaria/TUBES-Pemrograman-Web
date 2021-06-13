<?php
    session_start();

    if (isset($_SESSION['login'])) {
        echo "<script>alert('Logout Dahulu');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }

    include '../../config/koneksi.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="file.css">
    <title>Formulir</title>
</head>
<body>
<div class="container">
    <div class="konten">
    <div class="lock"></div>
    <h2 class="judul">Form Member Account</h2> 
                <div class="horizontal" id="data">
                <fieldset>
                    <legend>Data Account</legend>
                    <table>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" id="email"  placeholder="Masukan Email Anda"></td>
                    </tr>
                    </table>
                </fieldset>    
                    <fieldset>
                        <legend>Data Pribadi</legend>
                            <table>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><input type="text" name="nama" id="nama"  placeholder="Nama anda"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" ></td>
                            </tr>
                            <tr>
                                <td>No. NIK</td>
                                <td>:</td>
                                <td><input type="text" name="nik" id="nik"  placeholder="NIK anda"></td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td><input type="text" name="no_hp" id="no_hp"  placeholder="No. Handphone anda"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <select name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="">- Pilih -</option>
                                        <option value="Laki-Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </td>   
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>:</td>
                                <td><input type="text" name="alamat_rumah" id="alamat_rumah"  placeholder="Masukan alamat anda"></td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td>:</td>
                                <td><input type="textarea" name="tujuan" id="tujuan"  placeholder="Tujuan join member ini"></td>
                            </tr>
                            </table>
                            <div class="grup-offset">
                            <button name="submit" id="submit" onclick='daftar()'  >Submit</button>
                        </div>
                    </fieldset>
                </div>

    </div>
</div>

<script type="text/javascript">

    function daftar() {
        let nama = document.getElementById("nama").value;
        let tanggal_lahir = document.getElementById("tanggal_lahir").value;
        let nik = document.getElementById("nik").value;
        let no_hp = document.getElementById("no_hp").value;
        let jenis_kelamin = document.getElementById("jenis_kelamin").value;
        let alamat_rumah = document.getElementById("alamat_rumah").value;
        let tujuan = document.getElementById("tujuan").value;
        let email = document.getElementById("email").value;

        if(nama != '' && tanggal_lahir !='' && nik != '' && no_hp != '' && jenis_kelamin != '' && alamat_rumah != '' && tujuan != '' && email != '' ){

        var data = { nama : nama, tanggal_lahir : tanggal_lahir, nik : nik, no_hp : no_hp, jenis_kelamin : jenis_kelamin, alamat_rumah : alamat_rumah, tujuan : tujuan, email : email };
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/User/login/ajax.php?request=2", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                if(response == 1){
                    alert("Insert successfully.");

                    document.getElementById("nama").value = "";
                    document.getElementById("tanggal_lahir").value = "";
                    document.getElementById("nik").valuw = "";
                    document.getElementById("no_hp").value = "";
                    document.getElementById("jenis_kelamin").value = "";
                    document.getElementById("alamat_rumah").value = "";
                    document.getElementById("tujuan").value = "";
                    document.getElementById("email").value = "";
                }
            }
        };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }
    }
</script>

</body>
</html>