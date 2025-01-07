<?php
session_start();
require '../../../source/db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // session_unset();
    $username = $_POST["email"];
    $password = $_POST["password"];

    if($username == "bigcas_admin"){
        if($password == "qs7pC8M9d]mXGyR}"){
            header('Location: ../../../admin/login.php');
            exit();
        }
    }

    $sql = "SELECT * FROM customer WHERE username = '$username' OR email = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $hashedPassword = $row['password'];
    
    if ($count) {
        if (!password_verify($password, $hashedPassword)) {
            $_SESSION['error'] = "Invalid username or password!";
            $_SESSION['username'] = $row['username'];
            header('Location: ../../login.php?auth=login');
            exit();
        } else {
            $_SESSION['userloggedin'] = true;
            $_SESSION['customerID'] = $row['customer_id'];
            $_SESSION['notification'] = "Login Successfully!";
            header('Location: ../../index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid username!";
        header('Location: ../../login.php?auth=login');
        exit();
    }
}
