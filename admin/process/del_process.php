<?php
session_start();
require '../../source/db/connect.php';

// Product
if (isset($_GET['productID'])) {
    $pID = $_GET['productID'];
    $sql= "DELETE FROM product WHERE prd_id = '$pID'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE prd_id = '$id'"));
    $path = "../../source/images/upload/products/" . $row['prd_img'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path) && $query) {
        // session
        header('Location: ../inventory.php?page=product');
    } else {
        header('Location: ../inventory.php?page=product');
        // session
    }
}

// Category
if (isset($_GET['categoryID'])){
    $id = $_GET['categoryID'];
    $sql = "DELETE FROM category WHERE ctg_id = '$id'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM category WHERE ctg_id = '$id'"));
    $path = "../../source/images/upload/categories/" . $row['ctg_img'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path)) {
        // session
        header('Location: ../inventory.php?page=category');
    } else {
        header('Location: ../inventory.php?page=category');
        // session
    }
}

// Subcategory
if (isset($_GET['subcategoryID'])){
    $id = $_GET['subcategoryID'];
    $sql = "DELETE FROM subcategory WHERE subctg_id = '$id'";
    
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM subcategory WHERE subctg_id = '$id'"));
    $path = "../../source/images/upload/categories/" . $row['subctg_img'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path)) {
        // session
        $_SESSION['notification'] = "Image not exist";
        header('Location: ../inventory.php?page=category');
    } else {
        $para = "Delete";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// Variation
if (isset($_GET['variationID'])){
    $id = $_GET['variationID'];

    $sql = "DELETE FROM variation WHERE vrt_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $para = "Delete";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=variation');
    }
}

// Variation Option
if (isset($_GET['vrtoptionID'])){
    $id = $_GET['vrtoptionID'];
    $sql = "DELETE FROM variation_option WHERE vrtopt_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $para = "Delete";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=variation');
    }
}