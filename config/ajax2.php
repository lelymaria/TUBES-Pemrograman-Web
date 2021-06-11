<?php
include 'koneksi.php';

$request = 2;

// Read $_GET value
if (isset($_GET['request'])) {
    $request = $_GET['request'];
}
if ($request == 1) {

    // Select record 
    $sql = "SELECT * FROM tb_login where id_role =1 ";
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

if ($request == 2) {
    $data = json_encode(file_get_contents("php://input"));

    $email = $data->email;
    $password = $data->password;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_login (id, email, password, id_role) VALUES ('', '$email', '$password', 1)";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }

    exit;
}

?>