<?php
$host = "localhost";
$dbusername = "root";
$db = "bigcasdb";
$dbpassword = "";

$conn = new mysqli($host, $dbusername, $dbpassword, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>