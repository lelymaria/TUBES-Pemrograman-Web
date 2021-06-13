<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        echo "<script>alert('Login Dahulu');</script>";
        echo "<script>window.location.replace('../login/login.php');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Admin</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar">
			<div class="logo">
				<a href="">admin</a>
			</div>
			<hr>

			<li class="menu-item active">
				<a href="?page=dashboard">Dashboard</a>
			</li>
			<hr>
			<li class="menu-item">
				<a href="?page=kelola-user" class="dropdown-toggle">Kelola User</a>
			</li>
			<hr>
			<li class="menu-item">
				<a href="?page=formulir-user" class="dropdown-toggle">Formulir User</a>
			</li>
			<hr>
			<li class="menu-item">
				<a href="?page=event" class="dropdown-toggle"> Event XTC </a>
			</li>
			<hr>
			<li class="menu-item">
				<a href="?page=keloladmin" class="dropdown-toggle">Kelola Admin</a>
			</li>
			<hr>
			<li class="menu-item">
				<a href="../login/logout.php" class="dropdown-menu">Logout</a>	
			</li>
		</ul>
		<!-- End Sidebar -->

		<main class="content-wrapper">

			<!-- Content -->
			<div class="content">
				<!-- Navbar -->
				<nav class="navbar">
					<button class="menu-toggle btn" id="btn-toggle">
						<span></span>
						<span></span>
						<span></span>
					</button>

					<div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
				</nav>
				<!-- End Navbar -->

				<?php
					require 'mod/halaman.php';
				?>
			</div>
			<!-- End Content -->
		</main>
	</div>
</body>
<script src="js/style.js"></script>
</html>