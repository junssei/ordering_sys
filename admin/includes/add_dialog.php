<?php
require '../../source/db/connect.php';
if($_GET['page'] == "product") {
$page = $_GET['page'];
?>
<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add Product </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="addproduct" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_imginp">
            <div class="inputfile" style="border: none"; >
                <img src="../source/images/upload/products/gallery.png" class="imagedisp imageLarge">
                <div class="inp inpfile">
                    <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?= $fileupload_requirement ?>>
                </div>
            </div>
        </div>
        <div class="dialog_allinp">
            <div class="input">
                <div class="inp">
                    <input id="product_name" type="text" name="<?=$page?>name" placeholder="Product Name" required>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_brand" type="text" name="<?=$page?>brand" placeholder="Product Brand" required>
                </div> 
            </div>
            <div class="input_select">
                <select name="<?=$page?>category" required>
                    <option value="none"> None </option>
                    <?php
                    $fetchCategory = "SELECT * FROM subcategory";
                    $exec = mysqli_query($conn, $fetchCategory);
                    while ($rowCategory = mysqli_fetch_array($exec)) {
                            echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input_textarea">
                <div class="input_inptextarea">
                    <textarea name="<?=$page?>description" placeholder="Description..."></textarea>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_price" type="text" name="<?=$page?>price" placeholder="Set Base Price" required>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_size" type="text" name="<?=$page?>size" placeholder="Set Size" required>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add Product" name="submit_<?=$page?>">
            </div>
        </div>
    </form>
</div>
<?php } else if($_GET['page'] == "category") { $page = $_GET['page'];?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addcategory" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_imginp">
                <div class="inputfile" style="border: none"; >
                    <img src="../source/images/upload/products/gallery.png" class="imagedisp imageLarge">
                    <div class="inp inpfile">
                        <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?= $fileupload_requirement ?>>
                    </div>
                </div>
            </div>
            <div class="dialog_allinp">
                <div class="input">
                    <div class="inp">
                        <input id="category_name" type="text" name="<?=$page?>name" placeholder="Category Name" required>
                    </div>
                </div>
                <div class="input_textarea">
                    <div class="input_inptextarea">
                        <textarea name="<?=$page?>description" placeholder="Description..."></textarea>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Add <?=$page?>" name="submit_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
<?php } else if($_GET['page'] == "subcategory") { $page = $_GET['page']; ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addcategory" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_imginp">
                <div class="inputfile" style="border: none"; >
                    <img src="../source/images/upload/products/gallery.png" class="imagedisp imageLarge">
                    <div class="inp inpfile">
                        <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?= $fileupload_requirement ?>>
                    </div>
                </div>
            </div>
            <div class="dialog_allinp">
                <div class="input">
                    <div class="inp">
                        <input id="subcategory_name" type="text" name="<?=$page?>name" placeholder="Subcategory Name" required>
                    </div>
                </div>
                <div class="input_select">
                    <select name="category" required>
                        <option value="none"> None </option>
                        <?php
                        $fetchCategory = "SELECT * FROM category";
                        $exec = mysqli_query($conn, $fetchCategory);
                        while ($rowCategory = mysqli_fetch_array($exec)) {
                                echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input_textarea">
                    <div class="input_inptextarea">
                        <textarea name="<?=$page?>description" placeholder="Description..."></textarea>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Add <?=$page?>" name="submit_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
<?php } ?>