<?php
    session_start();
    require '../../source/db/connect.php';

    // Product
    if(isset($_POST['submit_product'])){
        $admin_id = $_POST['admin_id'];
        $product_name = $_POST['product_name'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_subcategory = $_POST['product_subcategory'];
        
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

        $insertProduct = "INSERT INTO product VALUES ('', '$product_name', '$product_brand', '$product_description','$product_price', '$filename', '$admin_id', '$product_subcategory', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";

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

        $checking = mysqli_query($conn, "SELECT * FROM product_category WHERE ctg_name = '$category_name' LIMIT 1");
        $checkifexist = mysqli_num_rows($checking);
        
        if($checkifexist){ //If email is already exist
            $_SESSION['notification'] = "Category is already exist.";
            header('Location: ../inventory.php?page=category');
            exit();
        }

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

        $insertCategory = "INSERT INTO product_category VALUES ('', '$category_name', '$category_desc', '$filename', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";

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

        $checking = mysqli_query($conn, "SELECT * FROM product_subcategory WHERE subctg_name = '$subcategory_name' AND ctg_id = '$subcategory_category' LIMIT 1");
        $checkifexist = mysqli_num_rows($checking);
        
        if($checkifexist){ //If email is already exist
            $_SESSION['notification'] = "Subcategory is already exist.";
            header('Location: ../inventory.php?page=category');
            exit();
        }
        
        if(!empty($_FILES["uploadimgsubcategory"]["name"])){
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
        }

        $insertCategory = "INSERT INTO product_subcategory VALUES ('','$subcategory_name','$subcategory_desc','$filename',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(), '$subcategory_category')";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=category');
        }
    }

    // Attributes
    if(isset($_POST['submit_attributes'])){
        $attributes_name = $_POST['attributes_name'];

        $checking = mysqli_query($conn, "SELECT * FROM attributes WHERE attribute_name = '$attributes_name'");
        $checkifexist = mysqli_num_rows($checking);
        
        if($checkifexist){ //If email is already exist
            $_SESSION['notification'] = "Attributes is already exist.";
            header('Location: ../inventory.php?page=attributes');
            exit();
        }

        $insertCategory = "INSERT INTO attributes VALUES ('','$attributes_name',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=attributes');
        }
    }

    // Attributes Option
    if(isset($_POST['submit_attributes_option'])){
        
        $option_value = $_POST['attributes_option_name'];
        $attributesID = $_POST['attributes_option_attributeID'];
        
        // Insert new input field
        foreach($option_value as $option => $value){
            $trimvalue = trim($value);

            if(!empty($trimvalue)){
            $insertOptionToattributes = "INSERT INTO attributes_option VALUES ('', '$attributesID', '$trimvalue', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";
            
            $query1 = mysqli_query($conn, $insertOptionToattributes);
            }
        }

        // This will update the current option
        if(isset($_POST['current_option_id'])){
            $currentid = $_POST['current_option_id'];
            $currentvalue = $_POST['current_option_name'];
            
            foreach($currentid as $index => $id){
                $optvalue = $currentvalue[$index];
                $updateOptionToattributes = "UPDATE attributes_option SET opt_value = '$optvalue', updated_at = CURRENT_TIMESTAMP() WHERE attributeopt_id = '$id'";
                
                $query2 = mysqli_query($conn, $updateOptionToattributes);
            }

            if ($query1 && $query2) {
                $para1 = "Insert";
                $para2 = "Update Option";
                $_SESSION['notification'] = $para1 . " and " . $para2 . " succesfully!";
                header('Location: ../inventory.php?page=attributes');
            } else if ($query2){
                $para2 = "Update Option";
                $_SESSION['notification'] = $para2 . " succesfully!";
                header('Location: ../inventory.php?page=attributes');
            }
        }

        if ($query1) {
            $para1 = "Insert";
            $_SESSION['notification'] = $para1 . " succesfully!";
            header('Location: ../inventory.php?page=attributes');
        }
    }
?>