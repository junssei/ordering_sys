<?php
session_start();
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <?php
        if($_GET["user"]){
            $id = $_GET["user"];

        }
        ?>
        <?php
        if($_GET["edit"]){
            $id = $_GET["edit"];
            
        }
        ?>
    </div>
</div>
<?php
include "include/footer.php";
?>