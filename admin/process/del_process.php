<?php
session_start();
require '../../source/db/connect.php';

if ($_GET['productID']) {
    $pID = $_GET['productID'];
    $sql= "DELETE FROM product WHERE prd_id = '$pID'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: ../inventory.php?page=product');
    }
}

if ($_GET['categoryID']){
    $id = $_GET['categoryID'];
    $sql = "DELETE FROM category WHERE ctg_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: ../inventory.php?page=category');
    }
}

if ($_GET['subcategoryID']){
    $id = $_GET['subcategoryID'];
    $sql = "DELETE FROM subcategory WHERE subctg_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: ../inventory.php?page=category');
    }
}