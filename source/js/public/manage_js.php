<!-- <script src="../source/js/global.js"></script>';  -->

<?php
if($title == "Login" || $title == "Sign Up"){
    echo '<script src="../source/js/auth.js"></script>';
} else {
    echo '<script src="../source/js/global.js"></script>';
    echo "<script src='../source/js/public/index.js'></script>";
    if($title == "Checkout") {
        echo '<script src="../source/js/public/app.js"></script>';
    }
}
?>