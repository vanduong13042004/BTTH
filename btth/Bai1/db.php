<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'flowers_db';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


mysqli_set_charset($conn, 'utf8');
?>