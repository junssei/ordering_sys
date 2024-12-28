<?php
$host = "localhost";
$dbusername = "root";
$db = "bigcasdb";
$dbpassword = "";

$conn = new mysqli($host, $dbusername, $dbpassword, $db);

$fileupload_requirement = 'accept=".png, .jpg, .jpeg, .webp, .svg"';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>