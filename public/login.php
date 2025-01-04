<?php
session_start();
$title = "Login";
include "include/header.php"
?>
<?php if($_GET['auth'] == "login"){ ?>
    

<?php } if($_GET['auth'] == "register") { ?>

<?php }
include "include/footer.php";
?>
