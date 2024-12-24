<?php
session_start();
require '../../source/db/connect.php';

if ($_GET['productID']) {
    $pID = $_GET['productID'];
    $sql= "DELETE FROM product WHERE prd_id = '$pID'";
    $deleteResult = mysqli_query($conn, $sql);

    if ($deleteResult) {
        echo "Delete Successfully";
        header('Location: ../product.php');
    } else {
        echo "Delete Failed";
        header('Location: ../product.php');
    }
} else if ($_GET['categoryID']){
    $cID = $_GET['categoryID'];
    $sql = "DELETE FROM category WHERE ctg_id = '$cID'";
    $deleteResult = mysqli_query($conn, $sql);

    if ($deleteResult) {
        echo "Delete Successfully";
        header('Location: ../category.php');
    } else {
        echo "Delete Failed";
        header('Location: ../category.php');
    }
}