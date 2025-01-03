<?php
session_start();
require '../../source/db/connect.php';

// Product
if (isset($_GET['productID'])) {
    $pID = $_GET['productID'];
    $sql= "DELETE FROM product WHERE product_id = '$pID'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'"));
    $path = "../../source/images/upload/products/" . $row['image'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path) && $query) {
        $_SESSION['notification'] = "Image not exist";
        header('Location: ../inventory.php?page=product');
    } else {
        $_SESSION['notification'] = $para . " succesfully!";
        header('Location: ../inventory.php?page=product');
        // session
    }
}

// Category
if (isset($_GET['categoryID'])){
    $id = $_GET['categoryID'];
    $sql = "DELETE FROM product_category WHERE ctg_id = '$id'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product_category WHERE ctg_id = '$id'"));
    $path = "../../source/images/upload/categories/" . $row['ctg_img'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path)) {
        $_SESSION['notification'] = "Image not exist";
        header('Location: ../inventory.php?page=category');
    } else {
        $_SESSION['notification'] = $para . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// Subcategory
if (isset($_GET['subcategoryID'])){
    $id = $_GET['subcategoryID'];
    $sql = "DELETE FROM product_subcategory WHERE subctg_id = '$id'";
    
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product_subcategory WHERE subctg_id = '$id'"));
    $path = "../../source/images/upload/categories/" . $row['subctg_img'];
    
    $query = mysqli_query($conn, $sql);
    if (!unlink($path)) {
        // session
        $_SESSION['notification'] = "Image not exist";
        header('Location: ../inventory.php?page=category');
    } else {
        $para = "Delete";
        $_SESSION['notification'] = $para . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// Attributes
if (isset($_GET['attributesID'])){
    $id = $_GET['attributesID'];

    $sql = "DELETE FROM attributes WHERE attribute_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $para = "Delete";
        $_SESSION['notification'] = $para . " succesfully!";
        header('Location: ../inventory.php?page=attributes');
    }
}

// Attributes Option
if (isset($_GET['attribute_optionID'])){
    $id = $_GET['attribute_optionID'];
    $sql = "DELETE FROM attributes_option WHERE attributeopt_id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $para = "Delete";
        $_SESSION['notification'] = $para . " succesfully!";
        header('Location: ../inventory.php?page=attributes');
    }
}