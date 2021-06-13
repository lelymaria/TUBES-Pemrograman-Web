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

        case 'event' :
            include "page/event/data_event.php";
            break;
        
            case 'ganti-password' :
                include "page/ganti-password/ganti-password.php";
                break;
        
        default:
            echo "404 Not Found";
            break;
    }

?>