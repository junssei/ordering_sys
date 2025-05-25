<?php
session_start();
require '../../source/db/connect.php';

// Product
if ($_GET['page'] == "product" && $_GET['id']) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM product WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowPrd = mysqli_fetch_array($result);

    include 'dialogs/delete_dialog/deleteproduct_dialog.php';
}

// Category
if ($_GET['page'] == "category" && $_GET['id']) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM product_category WHERE ctg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowCat = mysqli_fetch_array($result);

    include 'dialogs/delete_dialog/deletecategory_dialog.php';
}

// Subcategory
if ($_GET['page'] == "subcategory" && $_GET['id']) {
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM product_subcategory WHERE subctg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowSubctg = mysqli_fetch_array($result);

    include 'dialogs/delete_dialog/deletesubcategory_dialog.php';
}

// Attributes
if ($_GET['page'] == "attributes" && $_GET['id']) {
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM attributes WHERE attribute_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    include 'dialogs/delete_dialog/deleteattributes_dialog.php';
}

mysqli_close($conn);
