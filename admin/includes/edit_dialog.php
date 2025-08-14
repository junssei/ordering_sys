<?php
session_start();
require '../../source/db/connect.php';

// Product
if ($_GET['page'] == "product" && $_GET['id']) {
    include 'dialogs/edit_dialog/editproduct_dialog.php';
}

// category
if ($_GET['page'] == "category" && $_GET['id']) {
    include 'dialogs/edit_dialog/editcategory_dialog.php';
}

// subcategory
if ($_GET['page'] == "subcategory" && $_GET['id']) {
    include 'dialogs/edit_dialog/editsubcategory_dialog.php';
}

// attributes
if ($_GET['page'] == "attributes" && $_GET['id']) {
    include 'dialogs/edit_dialog/editattributes_dialog.php';
}

// product-variation
if ($_GET['page'] == "product_variation" && $_GET['id']) {
    include 'dialogs/edit_dialog/editproduct-variation_dialog.php';
}

// product-variation stock
if ($_GET['page'] == "product_variation" && $_GET['id']) {
}

mysqli_close($conn);
