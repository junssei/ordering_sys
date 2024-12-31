<?php
session_start();
require '../../source/db/connect.php';

// Product
if(isset($_POST['update_product'])){
    $id = $_POST['product_id'];
    $product_name = $_POST['productname'];
    $product_brand = $_POST['productbrand'];
    $product_price = $_POST['productprice'];
    $product_size = $_POST['productsize'];
    $product_category = $_POST['productcategory'];
    
    // For Image
    if(!empty($_FILES["uploadimgproduct"]["name"])){
        $filename = $_FILES["uploadimgproduct"]["name"];
        $tempname = $_FILES["uploadimgproduct"]["tmp_name"];
        $folder = "../../source/images/upload/products/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }
        
        $update = "UPDATE product SET prd_name = '$product_name', ctg_id = '$product_category', prd_brand = '$product_brand', prd_price = '$product_price', prd_size = '$product_size', prd_filename = '$filename' WHERE prd_id = '$id'";
    } else {
        $update = "UPDATE product SET prd_name = '$product_name', ctg_id = '$product_category', prd_brand = '$product_brand', prd_price = '$product_price', prd_size = '$product_size' WHERE prd_id = '$id'";
    }
    
    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=product');
    }
}

// Category
if(isset($_POST['update_category'])){
    $id = $_POST['category_id'];
    $category_name = $_POST['categoryname'];
    $category_desc = $_POST['categorydescription'];
    
    if(!empty($_FILES["uploadimgcategory"]["name"])){
        $filename = $_FILES["uploadimgcategory"]["name"];
        $tempname = $_FILES["uploadimgcategory"]["tmp_name"];
        $folder = "../../source/images/upload/categories/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $update = "UPDATE category SET ctg_name = '$category_name', ctg_desc = '$category_desc', ctg_img = '$filename', updated_at = CURRENT_TIMESTAMP() WHERE ctg_id = '$id'";
    } else {
        $update = "UPDATE category SET ctg_name = '$category_name', ctg_desc = '$category_desc', updated_at = CURRENT_TIMESTAMP() WHERE ctg_id = '$id'";
    }

    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// Subcategory
if(isset($_POST['update_subcategory'])){
    $id = $_POST['category_id'];
    $subcategory_category = $_POST['category'];
    $subcategory_name = $_POST['subcategoryname'];
    $subcategory_desc = $_POST['subcategorydescription'];
    
    if(!empty($_FILES["uploadimgsubcategory"]["name"])){
        $filename = $_FILES["uploadimgsubcategory"]["name"];
        $tempname = $_FILES["uploadimgsubcategory"]["tmp_name"];
        $folder = "../../source/images/upload/categories/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $update = "UPDATE subcategory SET subctg_name = '$subcategory_name', subctg_desc = '$subcategory_desc', subctg_img = '$filename', updated_at = CURRENT_TIMESTAMP(), ctg_id = '$subcategory_category' WHERE subctg_id = '$id'";
    } else {
        $update = "UPDATE subcategory SET subctg_name = '$subcategory_name', subctg_desc = '$subcategory_desc', updated_at = CURRENT_TIMESTAMP(), ctg_id = '$subcategory_category' WHERE subctg_id = '$id'";
    }
    
    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// Variation
if(isset($_POST['update_variation'])){
    $id = $_POST['variation_id'];
    $name = $_POST['variationname'];
    
    $update = "UPDATE variation SET vrt_name = '$name', updated_at = CURRENT_TIMESTAMP() WHERE vrt_id = '$id'";

    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=variation');
    }
}

mysqli_close($conn);