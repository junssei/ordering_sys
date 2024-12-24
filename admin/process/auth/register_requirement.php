<?php
$return = header('Location: ../../register.php');

$uppercase = preg_match("@[A-Z]@", $password);
$lowercase = preg_match("@[a-z]@", $password);
$number = preg_match("@[0-9]@", $password);
$specialchar= preg_match("@[^\w]@", $password);

if(!empty($_POST['firstname'])){
    $_SESSION['regfirstname'] = $firstname;
}

if(!empty($_POST['lastname'])){
    $_SESSION['reglastname'] = $lastname;
}

if(!empty($_POST['email'])){
    $_SESSION['regemail'] = $email;
}

if(strlen($password) < 8){
    $_SESSION['registerPSWerror'] = "Your password MUST be at least 8 characters long";
    // echo "<div class='errormessage'> Your password MUST be at least 8 characters long </div>";
    $return;
    exit();
}

if(!$uppercase){
    $_SESSION['registerPSWerror'] = "Your password MUST contain at least 1 uppercase letter";
    // echo "<div class='errormessage'> Your password MUST contain at least 1 lowercase letter </div>";
    $return;
    exit();
}

if(!$lowercase){
    $_SESSION['registerPSWerror'] = "Your password MUST contain at least 1 lowercase letter";
    // echo "<div class='errormessage'> Your password MUST contain at least 1 lowercase letter </div>";
    $return;
    exit();
}

if(!$number){
    $_SESSION['registerPSWerror'] = "Your password MUST contain at least 1 number";
    // echo "<div class='errormessage'> Your password MUST contain at least 1 number </div>";
    $return;
    exit();
}

if(!$specialchar){
    $_SESSION['registerPSWerror'] = "Your password MUST contain at least 1 special character";
    // echo "<div class='errormessage'> Your password MUST contain at least 1 special character </div>";
    $return;
    exit();
}