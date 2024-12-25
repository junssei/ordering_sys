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
    $filename = $_FILES["uploadimg"]["name"];
    $tempname = $_FILES["uploadimg"]["tmp_name"];
    $folder = "../../source/images/upload/products/" . $filename;

    $update = "UPDATE product SET prd_name = '$product_name', prd_brand = '$product_brand', prd_price = '$product_size'";

    $query = mysqli_query($conn, $update);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script> console.log('Image uploaded successfully!') </script>";
    } else {
        echo "<script> console.log('Failed to upload image!') </script>";
    }

    if ($query) {
        header('Location: ../product.php');
    }
}