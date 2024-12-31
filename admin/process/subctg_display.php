<?php
require '../../source/db/connect.php';
if($_GET['id']) { 
    $id = $_GET['id'];
    $fetchSubcategory = "SELECT * FROM subcategory WHERE ctg_id = $id";
    $exec = mysqli_query($conn, $fetchSubcategory);

    if($exec -> num_rows > 0){
        while ($rowSubcategory = mysqli_fetch_array($exec)) {
                echo "<option value='" . $rowSubcategory['subctg_id'] . "'>" . $rowSubcategory['subctg_name'] . "</option>";
        }
    } else {
        echo '<option value="0"> None </option>';
    }
} 
mysqli_close($conn);
