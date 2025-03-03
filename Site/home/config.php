<?php
$hostname = "localhost"; // Your MySQL server address
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "monara_eft"; // Your MySQL database name
$prefix = "http://localhost/EFTF/Admin/uploads/";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>