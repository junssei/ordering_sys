<?php
    session_start();
    require '../../source/db/connect.php';

    if(isset($_POST['submit_product'])){
        $product_name = $_POST['productname'];
        $product_brand = $_POST['productbrand'];
        $product_price = $_POST['productprice'];
        $product_size = $_POST['productsize'];
        $product_category = $_POST['productcategory'];
        
        if($_FILES["uploadimg"]["size"] > 500000){

        };

        // For Image
        $filename = $_FILES["uploadimg"]["name"];
        $tempname = $_FILES["uploadimg"]["tmp_name"];
        $folder = "../../source/images/upload/products/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $insertProduct = "INSERT INTO product VALUES ('', '$product_category', '$product_name', '$product_brand', '$product_price', '$product_size', '',CURRENT_DATE(), '$filename')";

        $query = mysqli_query($conn, $insertProduct);

        if ($query) {
            header('Location: ../inventory.php?page=product');
        }
    }

    if(isset($_POST['submit_category'])){
        $category_name = $_POST['categoryname'];

        $insertCategory = "INSERT INTO category VALUES ('', '$category_name', CURRENT_DATE())";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            header('Location: ../inventory.php?page=category');
        }
    }
?>