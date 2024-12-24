<?php
session_start();
$title = "Customer";
if(!isset($_SESSION['loggedin'])){
    header('Location: login.php');
    exit();
}

include 'includes/header.php';
?>
<div id="container">
    <div id="subcontainer">
        <?php include 'includes/sidebar.php'; ?>
        <div id="body">
            <?php include 'includes/indexheader.php'; ?>
            <div id="content">
                <div id="content_header">
                    
                </div>
                <div id="content_body">

                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>