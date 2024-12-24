<?php
    session_start();
    require '../../source/db/connect.php';

    if(isset($_POST['submit_category'])){
        $category_name = $_POST['categoryname'];

        $insertCategory = "INSERT INTO category VALUES ('', '$category_name', CURRENT_DATE())";

        $query = mysqli_query($conn, $insertCategory);

        if ($query) {
            header('Location: ../category.php');
        }
    }
?>