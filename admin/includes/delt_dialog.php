<?php
require '../../source/db/connect.php';

// Product
if($_GET['page'] == "product" && $_GET['id']){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM product WHERE prd_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowPrd = mysqli_fetch_array($result);
        ?>
        <div class="dialog_container">
            <div id="dialog_header">
                <h1>Delete Product</h1>
            </div>
            <div id="dialog_body">
                <div class="dialog_message">
                    <p> Are you sure you want to delete <span style="color: red"><?= $rowPrd['prd_name'] ?></span></p>
                </div>
                <div class="dialog_action">
                    <a href="process/del_process.php?productID=<?= $rowPrd['prd_id']?>" class="defaultbtn enabledbtn"> CONFIRM </a>
                    <a class="close_dialog defaultbtn cancelbtn"> CANCEL </a>
                </div>
            </div>
        </div>
        <?php
}

// Category
if($_GET['page'] == "category" && $_GET['id']){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM category WHERE ctg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowCat = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Delete Category </h1>
        </div>
        <div id="dialog_body">
            <div class="dialog_message">
                <p> Are you sure you want to delete <span style="color: red"><?= $rowCat['ctg_name'] ?></span></p>
            </div>
            <div class="dialog_action">
                <a href="process/del_process.php?categoryID=<?= $rowCat['ctg_id']?>" class="defaultbtn enabledbtn"> CONFIRM </a>
                <a class="close_dialog defaultbtn cancelbtn"> CANCEL </a>
            </div>
        </div>
    </div>
    <?php
}

// Subcategory
if($_GET['page'] == "subcategory" && $_GET['id']){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM subcategory WHERE subctg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowSubctg = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Delete Category </h1>
        </div>
        <div id="dialog_body">
            <div class="dialog_message">
                <p> Are you sure you want to delete <span style="color: red"><?= $rowSubctg['subctg_name'] ?></span></p>
            </div>
            <div class="dialog_action">
                <a href="process/del_process.php?subcategoryID=<?= $rowSubctg['subctg_id']?>" class="defaultbtn enabledbtn"> CONFIRM </a>
                <a class="close_dialog defaultbtn cancelbtn"> CANCEL </a>
            </div>
        </div>
    </div>
    <?php
}
mysqli_close($conn);