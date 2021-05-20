<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $nama_db = "login";

    $koneksi = mysql_connect($server, $username, $password, $login);


    if(!$koneksi)
    {
        echo "Database Tidak Konek";
    }

    else
    {
        echo "Koneksi Berjalan";
    }
?>