<?php
    if (isset($_GET['halaman'])) {
        $page = $_GET['halaman'];
    } else {
        $page = 'dashboard';
    }
?>

<?php
    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;
        

        //kategori
        case 'kategori';
            include '../page/keloladmin/dataadmin.php';
            break;

        //tambah data
        case 'tambah-data';
            include 'page/keloladmin/tambah-data.php';
            break;

        default:
            echo "404 Not Found";
            break;
    }
?>