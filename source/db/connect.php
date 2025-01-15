<?php

// $host = "localhost";
// $dbusername = "root";
// $db = "bigcasdb";
// $dbpassword = "";

// $host = "auth-db1762.hstgr.io";
// $db = "u746273317_bigcasdb";
// $dbusername = "u746273317_bigcas";
// $dbpassword = "f9!+O+twN";

if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    // Localhost credentials
    $host = "localhost";
    $dbusername = "root";
    $db = "bigcasdb";
    $dbpassword = "";
} else {
    // Remote server credentials
    $host = "auth-db1762.hstgr.io";
    $db = "u746273317_bigcasdb";
    $dbusername = "u746273317_bigcas";
    $dbpassword = "f9!+O+twN";
}

$conn = new mysqli($host, $dbusername, $dbpassword, $db);

$fileupload_requirement = 'accept=".png, .jpg, .jpeg, .webp, .svg"';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>