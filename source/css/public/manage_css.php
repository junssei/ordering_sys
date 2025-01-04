<link rel="stylesheet" href="../source/css/global.css">

<?php
if($title == "Login" || $title == "Sign Up"){
    echo "<link rel='stylesheet' href='../source/css/public/auth.css'>";
    echo "<link rel='stylesheet' href='../source/css/public/index.css'>";
} else {
    echo "<link rel='stylesheet' href='../source/css/public/index.css'>";
}
?>