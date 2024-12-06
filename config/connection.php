<?php
$username = "root";
$password = "";
$host = "localhost";
$database = "test_crud";

$connect = new mysqli($host, $username, $password, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>