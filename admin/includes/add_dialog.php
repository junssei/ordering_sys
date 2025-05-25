<!-- Product -->
<?php
session_start();
require '../../source/db/connect.php';

if ($_GET['page'] == "product") {
    $page = $_GET['page'];
    include 'dialogs/add_dialog/addproduct_dialog.php';
}

if ($_GET['page'] == "category") {
    $page = $_GET['page'];
    include 'dialogs/add_dialog/addcategory_dialog.php';
}

if ($_GET['page'] == "subcategory") {
    $page = $_GET['page'];
    include 'dialogs/add_dialog/addsubcategory_dialog.php';
}

if ($_GET['page'] == "attributes") {
    $page = $_GET['page'];
    include 'dialogs/add_dialog/addattributes_dialog.php';
}

if ($_GET['page'] == "attributes_option" && $_GET['id']) {
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM attributes WHERE attribute_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    include 'dialogs/add_dialog/addattributes-option_dialog.php';
}
?>