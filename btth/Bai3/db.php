<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'accounts_db';

$conn = new mysqli($host, $user, $password, $database);

if($conn)
{
    echo 'Kết nối thành công CSDL';
}
else 
{
    echo 'Kết nối thất bại CSDL ';
}
?>