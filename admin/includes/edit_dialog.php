<?php
require '../../source/db/connect.php';

// Product
if($_GET['page'] == "product" && $_GET['id']){
    $page = $_GET['page'];
    $pid = intval($_GET['id']);
    $sql = "SELECT * FROM product WHERE prd_id = '$pid'";
    $result = mysqli_query($conn, $sql);
    
    if ($rowPrd = mysqli_fetch_assoc($result)) {
        ?>
        <div class="dialog_container">
            <div id="dialog_header">
                <h1>Edit <?=ucwords($page)?></h1>
                <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
            </div>
            <form id="editproduct" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="dialog_imginp">
                    <input type="hidden" name="<?=$page?>_id" value="<?= $rowPrd['prd_id'] ?>">
                    <div class="inputfile" style="border: none;">
                        <img src="../source/images/upload/products/<?= htmlspecialchars($rowPrd['prd_filename']) ?>" class="imagedisp imageLarge">
                        <div class="inp inpfile">
                            <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?= $fileupload_requirement ?>>
                        </div>
                    </div>
                </div>
                <div class="dialog_allinp">
                    <div class="input">
                        <div class="inp">
                            <input id="product_name" type="text" name="<?=$page?>name" placeholder="Product Name" value="<?= htmlspecialchars($rowPrd['prd_name']) ?>" required>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inp">
                            <input id="product_brand" type="text" name="<?=$page?>brand" placeholder="Product Brand" value="<?= htmlspecialchars($rowPrd['prd_brand']) ?>" required>
                        </div> 
                    </div>
                    <div class="input_select">
                        <select name="<?=$page?>category" required>
                            <option value="N/A"> None </option>
                            <?php
                            $fetchCategory = "SELECT * FROM category";
                            $exec = mysqli_query($conn, $fetchCategory);
                            while ($rowCategory = mysqli_fetch_array($exec)) {
                                if($rowCategory['ctg_id'] == $rowPrd['ctg_id']){
                                    echo "<option value='" . $rowCategory['ctg_id'] . "' selected>" . $rowCategory['ctg_name'] . "</option>";   
                                } else {
                                    echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                                }
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
                            <input id="product_price" type="text" name="<?=$page?>price" placeholder="Set Price" value="<?= htmlspecialchars($rowPrd['prd_price']) ?>" required>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inp">
                            <input id="product_size" type="text" name="<?=$page?>size" placeholder="Set Size" value="<?= htmlspecialchars($rowPrd['prd_size']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="input_actions">
                        <input class="enabledbtn defaultbtn" type="submit" value="Update Product" name="update_<?=$page?>">
                    </div>
                </div>
            </form>
        </div>
        <?php 
    }
}

//category
if($_GET['page'] == "category" && $_GET['id']){
    $page = $_GET['page'];
    $cid = intval($_GET['id']);
    $sql = "SELECT * FROM category WHERE ctg_id = '$cid'";
    $result = mysqli_query($conn, $sql);
    $rowCat = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Edit <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="editcategory" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_imginp">
                <input type="hidden" name="<?=$page?>_id" value="<?= $rowCat['ctg_id'] ?>">
                <div class="inputfile" style="border: none;">
                    <img src="../source/images/upload/categories/<?= htmlspecialchars($rowCat['ctg_img']) ?>" class="imagedisp imageLarge">
                    <div class="inp inpfile">
                        <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?=$fileupload_requirement?>>
                    </div>
                </div>
            </div>
            <div class="dialog_allinp">
                <div class="input">
                    <div class="inp">
                        <input type="hidden" name="category_id" value="<?= $rowCat['ctg_id'] ?>">
                        <input id="product_name" type="text" name="<?=$page?>name" placeholder="Product Name" required value="<?= htmlspecialchars($rowCat['ctg_name']) ?>">
                    </div>
                </div>
                <div class="input_textarea">
                    <div class="input_inptextarea">
                        <textarea name="<?=$page?>description" placeholder="Description..."><?= htmlspecialchars($rowCat['ctg_desc']) ?></textarea>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Update <?=$page?>" name="update_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
    <?php
}

//subcategory
if($_GET['page'] == "subcategory" && $_GET['id']){
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM subcategory WHERE subctg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowSubctg = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Edit <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="editcategory" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_imginp">
                <input type="hidden" name="<?=$page?>_id" value="<?= $rowSubctg['subctg_id'] ?>">
                <div class="inputfile" style="border: none;">
                    <img src="../source/images/upload/categories/<?= htmlspecialchars($rowSubctg['subctg_img']) ?>" class="imagedisp imageLarge">
                    <div class="inp inpfile">
                        <input class="imageupld choosefilebtn" type="file" name="uploadimg<?=$page?>" <?= $fileupload_requirement ?>>
                    </div>
                </div>
            </div>
            <div class="dialog_allinp">
                <div class="input">
                    <div class="inp">
                        <input type="hidden" name="category_id" value="<?= $rowSubctg['subctg_id'] ?>">
                        <input id="product_name" type="text" name="<?=$page?>name" placeholder="Product Name" required value="<?= htmlspecialchars($rowSubctg['subctg_name']) ?>">
                    </div>
                </div>
                <div class="input_select">
                    <select name="category" required>
                        <option value=""> None </option>
                        <?php
                        $fetchCategory = "SELECT * FROM category";
                        $exec = mysqli_query($conn, $fetchCategory);
                        while ($rowCategory = mysqli_fetch_array($exec)) {
                            if($rowCategory['ctg_id'] == $rowSubctg['ctg_id']){
                                echo "<option value='" . $rowCategory['ctg_id'] . "' selected>" . $rowCategory['ctg_name'] . "</option>";   
                            } else {
                                echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input_textarea">
                    <div class="input_inptextarea">
                        <textarea name="<?=$page?>description" placeholder="Description..."><?= htmlspecialchars($rowSubctg['subctg_desc']) ?></textarea>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Update <?=$page?>" name="update_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
    <?php
}

//variation
if($_GET['page'] == "variation" && $_GET['id']){
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM variation WHERE vrt_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="edit<?=$page?>" class="dialog_form" action="process/upd_process.php" method="post" autocomplete="off">
            <div class="dialog_allinp">
                <input type="hidden" name="<?=$page?>_id" value="<?= $row['vrt_id'] ?>">
                <div class="input">
                    <div class="inp">
                        <input id="<?=$page?>_name" type="text" name="<?=$page?>name" placeholder="<?=ucwords($page)?> Name" required value="<?= htmlspecialchars($row['vrt_name']) ?>">
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Update <?=$page?>" name="update_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
    <?php
}
mysqli_close($conn);