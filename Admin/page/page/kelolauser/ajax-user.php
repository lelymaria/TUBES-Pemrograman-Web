<?php

include '../../../../config/koneksi.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}

if($request == 1){

	$sql = "SELECT * FROM data_user";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
			"id" => $row['id'],
			"nama" => $row['nama'],
			"tanggal_lahir" => $row['tanggal_lahir'],
			);
	}

	echo json_encode($response);
	exit;
}

if($request == 2){

	$data = json_decode(file_get_contents("php://input"));

	$email = $data->email;
    $password = $data->password;

    $password = password_hash($password, PASSWORD_DEFAULT);
	
	$sql = "INSERT INTO tb_login (id, email, password, id_role) VALUES ('', '$email', '$password', 1)";
	if(mysqli_query($con,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id = $_GET['id'];

	$sql = $con->query("DELETE FROM tb_login WHERE id = $id");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if ($request == 4) {

	$id = $_GET["id"];
	$sql = $con->query("SELECT * FROM tb_login WHERE id = '$id'");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id' => $ambil['id'],
	        'email' => $ambil['email'],
	        'password' => $ambil['password']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

	$id = $data->id;
    $email = $data->email;
    $password = $data->password;

	$sql = $con->query("UPDATE tb_login SET email = '$email', password = '$password' WHERE id = $id");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if ($request == 6) {

	$id = $_GET['id'];

	$sql = $con->query("UPDATE data_user SET status = 1 WHERE id = $id");
	$data_sql = $con->query("SELECT * FROM data_user WHERE id = $id ");
	$sql_data = $data_sql->fetch_assoc();
	$email = $sql_data['email'];
	$password = "user";
	date_default_timezone_set("Asia/Jakarta");
	$tanggal_daftar = date("Y-m-d H:i:s");
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	$data = $con->query("INSERT INTO tb_login (id, email, password, tanggal_daftar, id_role) VALUES ('', '$email', '$password', '$tanggal_daftar', 2) ");
	
	if($data){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if ($request == 7) {

	$id = $_GET['id'];

	$data_user = $con->query("SELECT * FROM data_user = '");

	$sq = $con->query("UPDATE data_user SET status = 0 WHERE id = $id");
	$sql = $con->query("DELETE FROM tb_login WHERE id = $id ");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if($request == 8){

	$sql = "SELECT * FROM data_user WHERE status = 1";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
			"id" => $row['id'],
			"nama" => $row['nama'],
			"tanggal_lahir" => $row['tanggal_lahir'],
			"jenis_kelamin" => $row['jenis_kelamin']
		);
	}

	echo json_encode($response);
	exit;
}