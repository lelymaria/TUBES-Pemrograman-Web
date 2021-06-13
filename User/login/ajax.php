<?php

include '../../config/koneksi.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}



if($request == 2){

	$data = json_decode(file_get_contents("php://input"));
    
    $nama = $data->nama;
    $tanggal_lahir = $data->tanggal_lahir;
    $nik = $data->nik;
    $no_hp = $data->no_hp;
    $jenis_kelamin = $data->jenis_kelamin;
    $alamat_rumah = $data->alamat_rumah;
    $tujuan = $data->tujuan;
	$email = $data->email;
    $password = "user";

    $password = password_hash($password, PASSWORD_DEFAULT);

	$sql = $con->query("INSERT INTO data_user VALUES ('', '$nama', '$nik', '$no_hp', '$jenis_kelamin', '$tujuan', '$tanggal_lahir', '$alamat_rumah', 0 ,'$email', '$password')");
    
    if ($sql != 0) {
        echo 1;
    } else {
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