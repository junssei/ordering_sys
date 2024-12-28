<?php
    session_start();
    require '../../source/db/connect.php';

    // Product
    if(isset($_POST['submit_product'])){
        $product_name = $_POST['productname'];
        $product_brand = $_POST['productbrand'];
        $product_price = $_POST['productprice'];
        $product_size = $_POST['productsize'];
        $product_category = $_POST['productcategory'];
        
        // For Image
        $filename = $_FILES["uploadimgproduct"]["name"];
        $tempname = $_FILES["uploadimgproduct"]["tmp_name"];
        $folder = "../../source/images/upload/products/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $insertProduct = "INSERT INTO product VALUES ('', '$product_name', '$product_brand', '$product_price', '$product_size', '',CURRENT_DATE(), '$filename', '$product_category')";

        $query = mysqli_query($conn, $insertProduct);

        if ($query) {
            header('Location: ../inventory.php?page=product');
        }
    }

    // Categories
    if(isset($_POST['submit_category'])){
        $category_name = $_POST['categoryname'];
        $category_desc = $_POST['categorydescription'];

        // For Image
        $filename = $_FILES["uploadimgcategory"]["name"];
        $tempname = $_FILES["uploadimgcategory"]["tmp_name"];
        $folder = "../../source/images/upload/categories/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $insertCategory = "INSERT INTO category VALUES ('', '$category_name', '$category_desc', '$filename', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            header('Location: ../inventory.php?page=category');
        }
    }
    
    // Subcategory
    if(isset($_POST['submit_subcategory'])){
        $subcategory_category = $_POST['category'];
        $subcategory_name = $_POST['subcategoryname'];
        $subcategory_desc = $_POST['subcategorydescription'];

        // For Image
        $filename = $_FILES["uploadimgsubcategory"]["name"];
        $tempname = $_FILES["uploadimgsubcategory"]["tmp_name"];
        $folder = "../../source/images/upload/categories/" . $filename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> console.log('Image uploaded successfully!') </script>";
        } else {
            echo "<script> console.log('Failed to upload image!') </script>";
        }

        $insertCategory = "INSERT INTO subcategory VALUES ('','$subcategory_name','$subcategory_desc','$filename',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(), '$subcategory_category')";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            header('Location: ../inventory.php?page=category');
        }
    }
?>