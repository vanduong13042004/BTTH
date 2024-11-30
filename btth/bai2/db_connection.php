<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracnghiem";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    
    error_log("Connection failed: " . $conn->connect_error, 0);
    die("Không thể kết nối đến cơ sở dữ liệu. Vui lòng thử lại sau.");
}


$conn->set_charset("utf8mb4");
?>