<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tubesdb";

// Create connection
$object = new mysqli($servername, $username, $password, $database);
$procedure = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($object->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$procedure) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
    $pdo = new PDO("mysql:host=$servername;dbname=tubesdb", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>