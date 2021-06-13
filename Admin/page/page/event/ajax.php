<?php

include '../../../../config/koneksi.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}

if($request == 1){

	$sql = "SELECT * FROM event";
	$employeeData = mysqli_query($con,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
			"id" => $row['id'],
			"nama_acara" => $row['nama_acara'],
			"tanggal_acara" => $row['tanggal_acara']
			);
	}

	echo json_encode($response);
	exit;
}

if($request == 2){

	$data = json_decode(file_get_contents("php://input"));

    $nama_acara = $data->nama_acara;
    $tanggal_acara = $data->tanggal_acara;

	$sql = "INSERT INTO event VALUES ('', '$tanggal_acara', '$nama_acara')";

	if(mysqli_query($con,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id = $_GET['id'];

	$sql = $con->query("DELETE FROM event WHERE id = $id");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if ($request == 4) {

	$id = $_GET["id"];
	$sql = $con->query("SELECT * FROM event WHERE id = '$id'");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id' => $ambil['id'],
	        'nama_acara' => $ambil['nama_acara'],
	        'tanggal_acara' => $ambil['tanggal_acara']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

	$id = $data->id;
    $nama_acara = $data->nama_acara;
    $tanggal_acara = $data->tanggal_acara;

	$sql = $con->query("UPDATE event SET nama_acara = '$nama_acara', tanggal_acara = '$tanggal_acara' WHERE id = $id");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}