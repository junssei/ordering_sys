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
    $cID = $_GET['categoryID'];
    $sql = "DELETE FROM category WHERE ctg_id = '$cID'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: ../inventory.php?page=category');
    }
}