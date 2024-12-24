<?php
session_start();
require '../../../source/db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    // $createusername = $firstname . $lastname;
    // $username = strtolower(str_replace(' ','', $createusername)); 
    $username = strtolower(str_replace(' ','', $firstname));
    $cpassword = $_POST["confirm_password"];
    $email = $_POST["email"];
    $role = "unassigned";

    include 'register_requirement.php';
    $sqlemail = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
    $resultemail = mysqli_query($conn, $sqlemail);
    $count = mysqli_num_rows($resultemail);
    
    if($count){ //If email is already exist
        $_SESSION['registerEmailExist'] = "An account with this email address already exists.";
        header('Location: ../../register.php');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO admin(firstname, lastname, username, password, email, role) VALUES('$firstname', '$lastname', '$username', '$hashedPassword', '$email', '$role')";
    $signup = mysqli_query($conn, $sql);

    if ($signup) {
        $_SESSION['success'] = "Registered Succesfully!";
        header('Location: ../../login.php');
        exit();
    } 
} else {
    header('Location: ../../register.php');
    exit();
}

?>