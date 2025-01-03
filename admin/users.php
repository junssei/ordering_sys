<?php
session_start();
$title = "Users";

include 'includes/header.php';
?>
<div id="container">
    <div id="subcontainer">
        <?php 
        include 'includes/sidebar.php';

        // User: Profile
        if($_GET['page'] == "profile") {
            include 'includes/users/profile.php';
        }

        // User: Admin Interface
        if($_GET['page'] == "admin") {
            include 'includes/users/user_admin.php';
        }
    
        // User: Customer Interface 
        if ($_GET['page'] == "customer") { 
            include 'includes/users/user_customer.php';
        }
        ?>
    </div>
</div>
<?php
include 'includes/footer.php';
?>