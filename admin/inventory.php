<?php
session_start();
$title = "Inventory";

include 'includes/header.php';
?>
<div id="container">
    <div id="subcontainer">
        <?php 
        include 'includes/sidebar.php';

        // User: Admin Interface
        if($_GET['page'] == "product") {
            include 'includes/inventory/product.php';
        }
    
        // User: Customer Interface 
        if ($_GET['page'] == "category") { 
            include 'includes/inventory/category.php';
        }
        ?>
    </div>
</div>
<?php
include 'includes/footer.php';
?>