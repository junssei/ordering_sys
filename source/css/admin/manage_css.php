<link rel="stylesheet" href="../source/css/global.css">

<?php
if($title == "Login" || $title == "Sign Up"){
    echo "<link rel='stylesheet' href='../source/css/admin/auth.css'>";
} else {
    echo "<link rel='stylesheet' href='../source/css/admin/index.css'>";
}
?>