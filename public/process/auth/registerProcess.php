<?php
session_start();
require '../../../source/db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    $email = $_POST["email"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    
    $password = $_POST["password"];
    $cpassword = $_POST["confirm_password"];
    
    include 'register_requirement.php';
    $fetch = "SELECT * FROM customer WHERE username = '$username' LIMIT 1";
    $query = mysqli_query($conn, $fetch);
    $count = mysqli_num_rows($query);
    if($count){ //If username is already exist
        $_SESSION['registerUserExist'] = "An account with this username already exists.";
        header('Location: ../../login.php?auth=register');
        exit();
    }

    $fetch = "SELECT * FROM customer WHERE email = '$email' LIMIT 1";
    $query = mysqli_query($conn, $fetch);
    $count = mysqli_num_rows($query);
    if($count){ //If email is already exist
        $_SESSION['registerEmailExist'] = "An account with this email address already exists.";
        header('Location: ../../login.php?auth=register');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO customer VALUES ('', '$username', '$hashedPassword', '$firstname', '$lastname', '', '$email', '', '', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";
    $signup = mysqli_query($conn, $sql);
    $last_id = $conn->insert_id;
    
    if ($signup) {
        $createCart = "INSERT INTO cart VALUES ('', '$last_id', CURRENT_TIMESTAMP())";
        $query = mysqli_query($conn, $createCart);
        $_SESSION['notification'] = "Registered Succesfully!";
        header('Location: ../../login.php?auth=login');
        exit();
    } 
} else {
    header('Location: ../../login.php?auth=register');
    exit();
}
?>