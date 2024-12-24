<script src="../source/js/global.js"></script>

<?php
if($title == "Login" || $title == "Sign Up"){
    echo '<script src="../source/js/auth.js"></script>';
} else {
    echo "<script src='../source/js/admin/index.js'></script>";
    echo "<script src='../source/js/admin/dialg.js'></script>";
}
?>