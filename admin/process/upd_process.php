<?php
session_start();
require '../../source/db/connect.php';

// Product
if(isset($_POST['update_product'])){
    $id = $_POST['product_id'];
    $admin_id = $_POST['admin_id'];
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_subcategory = $_POST['product_subcategory'];
    
    if(empty($product_subcategory) || $product_subcategory == 0){
        $_SESSION['notification'] = " succesfully!";
        header('Location: ../inventory.php?page=product');
    }

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
        
        $update = "UPDATE product SET product_name = '$product_name', subctg_id = '$product_subcategory', product_brand = '$product_brand', description = '$product_description', baseprice = '$product_price', image = '$filename', updated_at = CURRENT_TIMESTAMP() WHERE product_id = '$id'";
    } else {
        $update = "UPDATE product SET product_name = '$product_name', subctg_id = '$product_subcategory', product_brand = '$product_brand', description = '$product_description', baseprice = '$product_price', admin_id = $admin_id, updated_at = CURRENT_TIMESTAMP() WHERE product_id = '$id'";
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

        $update = "UPDATE product_category SET ctg_name = '$category_name', ctg_desc = '$category_desc', ctg_img = '$filename', updated_at = CURRENT_TIMESTAMP() WHERE ctg_id = '$id'";
    } else {
        $update = "UPDATE product_category SET ctg_name = '$category_name', ctg_desc = '$category_desc', updated_at = CURRENT_TIMESTAMP() WHERE ctg_id = '$id'";
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

        $update = "UPDATE product_subcategory SET subctg_name = '$subcategory_name', subctg_desc = '$subcategory_desc', subctg_img = '$filename', updated_at = CURRENT_TIMESTAMP(), ctg_id = '$subcategory_category' WHERE subctg_id = '$id'";
    } else {
        $update = "UPDATE product_subcategory SET subctg_name = '$subcategory_name', subctg_desc = '$subcategory_desc', updated_at = CURRENT_TIMESTAMP(), ctg_id = '$subcategory_category' WHERE subctg_id = '$id'";
    }
    
    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=category');
    }
}

// attribute
if(isset($_POST['update_attributes'])){
    $id = $_POST['attributes_id'];
    $name = $_POST['attributes_name'];
    
    $update = "UPDATE attributes SET attribute_name = '$name', updated_at = CURRENT_TIMESTAMP() WHERE attribute_id = '$id'";

    $query = mysqli_query($conn, $update);
    
    if ($query) {
        $para1 = "Update";
        $_SESSION['notification'] = $para1 . " succesfully!";
        header('Location: ../inventory.php?page=attributes');
    }
}

mysqli_close($conn);