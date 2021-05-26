<?php 
// mengaktifkan session php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Harus Login Terlebih Dahulu');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {
    // menghapus semua session
    session_destroy();

    // mengalihkan halaman ke halaman login
    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}

?>