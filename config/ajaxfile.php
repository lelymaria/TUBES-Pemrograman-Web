<?php
include 'koneksi.php';

$request = 2;

// Read $_GET value
if (isset($_GET['request'])) {
    $request = $_GET['request'];
}
if ($request == 1) {

    // Select record 
    $sql = "SELECT * FROM tb_login where id_role =2  ";
    $data = mysqli_query($con, $sql);

    $response = array();
    $no = 1;
    //    "<a class=' btn_edit' href='formedit.php?id=" . $row[' id'] . "'>Edit</a>  <a class='btn_delete' href='proses/delete.php?id=" . $row['id'] . "'>Hapus</a>";
    while ($row = mysqli_fetch_assoc($data)) {
        $response[] = array(
            'no' => $no++,
            "id" => $row['id'],
            "email" => $row['email'],
            "tanggal_daftar" => $row['tanggal_daftar'],

        );
    }

    echo json_encode($response);
    exit;
}
// POST
if ($request == 2) {


    // Read POST data
    $data = json_decode(file_get_contents("php://input"));

    $nama = $data->nama;
    $nik = $data->nik;
    $no_hp = $data->no_hp;
    $jenis_kelamin = $data->jenis_kelamin;
    $tujuan = $data->tujuan;
    $alamat_rumah = $data->alamat_rumah;
    $tanggal_lahir = $data->tanggal_lahir;
    // Insert record

    $sql = "INSERT INTO  data_user (nama,nik,no_hp,jenis_kelamin,tujuan,tanggal_lahir,alamat_rumah) VALUES('$nama','$nik','$no_hp','$jenis_kelamin','$tujuan', '$tanggal_lahir' ,'$alamat_rumah' )";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}

if ($request == 3) {
    $id = $_GET['id'];

    $sql = $con->query("DELETE FROM tb_login WHERE id = $id ");

    if ($sql) {
        echo 1;
    } else {
        echo 0;
    }

    exit;
}
