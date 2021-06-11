<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard':
            include "page/dashboard.php";
            break;
        
        case 'kelola-user':
            include "page/kelolauser/data_kelola_user.php";
            break;

        case 'formulir-user' :
            include 'page/kelolauser/formulir-user.php';
            break;
        
        case 'detail_user' :
            include 'page/kelolauser/detail_user.php';
            break;

        case 'keloladmin':
            include "page/keloladmin/dataadmin.php";
            break;

        default:
            echo "404 Not Found";
            break;
    }

?>