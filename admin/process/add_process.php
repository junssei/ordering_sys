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
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
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
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=category');
        }
    }
    
    // Subcategory
    if(isset($_POST['submit_subcategory'])){
        $subcategory_category = $_POST['category'];
        $subcategory_name = $_POST['subcategoryname'];
        $subcategory_desc = $_POST['subcategorydescription'];

        // For Image
        $filename = $_FILES["uploadimgsubcategory"]["name"] . $subcategory_name . $id;
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
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=category');
        }
    }

    // Variation
    if(isset($_POST['submit_variation'])){
        $variation_name = $_POST['variationname'];

        $insertCategory = "INSERT INTO variation VALUES ('','$variation_name',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=variation');
        }
    }

    // Variation Option
    if(isset($_POST['submit_option_variation'])){
        
        $option_value = $_POST['option_variation_name'];
        $variationID = $_POST['option_variation_vrtid'];
        
        foreach($option_value as $option => $value){
            $trimvalue = trim($value);

            if(!empty($trimvalue)){
            $insertOptionToVariation = "INSERT INTO variation_option VALUES ('','$trimvalue',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(), '$variationID')";
            
            $query1 = mysqli_query($conn, $insertOptionToVariation);
            }
        }

        // This will update the current option
        if(isset($_POST['current_option_id'])){
            $currentid = $_POST['current_option_id'];
            $currentvalue = $_POST['current_option_name'];
            
            foreach($currentid as $index => $id){
                $optvalue = $currentvalue[$index];
                $updateOptionToVariation = "UPDATE variation_option SET option_value = '$optvalue', updated_at = CURRENT_TIMESTAMP() WHERE vrtopt_id = '$id'";
                
                $query2 = mysqli_query($conn, $updateOptionToVariation);
            }

            if ($query1 && $query2) {
                $para1 = "Insert";
                $para2 = "Update Option";
                $_SESSION['notification'] = $para1 . " and " . $para2 . " succesfully!";
                header('Location: ../inventory.php?page=variation');
            } else if ($query2){
                $para2 = "Update Option";
                $_SESSION['notification'] = $para2 . " succesfully!";
                header('Location: ../inventory.php?page=variation');
            }
        }

        if ($query1) {
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=variation');
        }
    }
?>