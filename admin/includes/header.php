<?php
require '../source/db/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../source/images/icon/newicon3.png">
    <?php 
    echo "<title> $title </title>";
    include '../source/css/admin/manage_css.php';
    ?>
</head>
<body>
<?php
if (isset($_SESSION['notification'])){
    echo "<div class='popupnotification'><p>" . $_SESSION['notification'] . "</p></div>";
    unset($_SESSION['notification']);
}
?>