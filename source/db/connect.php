<?php

$host = "localhost";
$dbusername = "root";
$db = "bigcasdb";
$dbpassword = "";

// $host = "auth-db1762.hstgr.io";
// $db = "u746273317_bigcasdb";
// $dbusername = "u746273317_bigcas";
// $dbpassword = "f9!+O+twN";

$conn = new mysqli($host, $dbusername, $dbpassword, $db);

$fileupload_requirement = 'accept=".png, .jpg, .jpeg, .webp, .svg"';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>