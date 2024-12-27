<?php
session_start();
require '../../source/db/connect.php';

if(isset($_POST['update_product'])){
    $id = $_POST['product_id'];
    $product_name = $_POST['productname'];
    $product_brand = $_POST['productbrand'];
    $product_price = $_POST['productprice'];
    $product_size = $_POST['productsize'];
    $product_category = $_POST['productcategory'];
    
    // For Image
    if(!empty($_FILES["uploadimg"]["name"])){
        $filename = $_FILES["uploadimg"]["name"];
        $tempname = $_FILES["uploadimg"]["tmp_name"];
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
        header('Location: ../inventory.php?page=product');
    }
}

if(isset($_POST['update_category'])){
    $id = $_POST['category_id'];
    $category_name = $_POST['categoryname'];
    
    $update = "UPDATE product SET ctg_name = '$category_name' WHERE ctg_id = '$id'";
    
    $query = mysqli_query($conn, $update);
    
    if ($query) {
        header('Location: ../inventory.php?page=category');
    }
}

mysqli_close($conn);