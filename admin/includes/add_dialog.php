<!-- Product -->
<?php require '../../source/db/connect.php';
if($_GET['page'] == "product") { $page = $_GET['page']; ?>
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
            <div class="input_textarea">
                <div class="input_inptextarea">
                    <textarea name="<?=$page?>description" placeholder="Description..."></textarea>
                </div>
            </div>
        </div>
        <div class="dialog_allinp">
            <!-- Category -->
            <div>
                <label for="<?=$page?>_category"> Category </label>
                <div class="input_select">
                    <select name="<?=$page?>_category" required onchange="ctgDISPsubctg(this.value)" class="input_category">
                        <option value="0"> None </option>
                        <?php
                        $fetchcategory = "SELECT * FROM category";
                        $exec = mysqli_query($conn, $fetchcategory);
                        while ($fetchcategory = mysqli_fetch_array($exec)) {
                                echo "<option value='" . $fetchcategory['ctg_id'] . "'>" . $fetchcategory['ctg_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Subcategory -->
            <div>
                <label for="<?=$page?>_subcategory"> Subcategory </label>
                <div class="input_select ">
                    <select name="<?=$page?>_subcategory" required class="input_subcategory">
                        <option value="none"> None </option>
                        <!-- <?php
                        $fetchSubcategory = "SELECT * FROM subcategory";
                        $exec = mysqli_query($conn, $fetchSubcategory);
                        while ($rowSubcategory = mysqli_fetch_array($exec)) {
                                echo "<option value='" . $rowSubcategory['subctg_id'] . "'>" . $rowSubcategory['subctg_name'] . "</option>";
                        }
                        ?> -->
                    </select>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_price" type="text" name="<?=$page?>price" placeholder="Set Base Price" required>
                </div>
            </div>

            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add Product" name="submit_<?=$page?>">
            </div>
        </div>
    </form>
</div>
<!-- Category -->
<?php } if($_GET['page'] == "category") { $page = $_GET['page'];?>
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
<!-- Subcategory -->
<?php } if($_GET['page'] == "subcategory") { $page = $_GET['page']; ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addsubcategory" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
<!-- Variation  -->
<?php } if($_GET['page'] == "variation") { $page = $_GET['page']; ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?=ucwords($page)?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="add<?=$page?>" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_allinp">
                <div class="input">
                    <div class="inp">
                        <input id="<?=$page?>_name" type="text" name="<?=$page?>name" placeholder="<?=ucwords($page)?> Name" required>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Add <?=$page?>" name="submit_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
<?php }  if($_GET['page'] == "option_variation" && $_GET['id']) {
    $page = $_GET['page'];
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM variation WHERE vrt_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add <?= $row['vrt_name'] ?> Option </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="add_<?=$page?>" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_allinp">
                <input type="hidden" name="<?=$page?>_vrtid" value="<?= $row['vrt_id'] ?>">
                <div class="flex-rowdirection">
                    <div id="multiple_input_container"> <!-- Where all input added -->
                        <?php 
                        $fetchCurrentOption = "SELECT * FROM variation_option WHERE vrt_id = {$row['vrt_id']} ORDER BY vrtopt_id DESC";
                        $exec_vrtopt = mysqli_query($conn, $fetchCurrentOption);
                        ?>
                        <div class="flex-rowdirection">
                            <div class="input">
                                <div class="inp">
                                    <input id="<?=$page?>_name" type="text" name="<?=$page?>_name[]" placeholder="Option name" <?php if($exec_vrtopt -> num_rows < 0) { ?> required <?php } ?>>
                                </div>
                            </div>
                            <img id="addinputfield" src="../source/images/icon/svg/addanother.svg" class="btn imageMediumSmall" alt="addanotherinput" onclick="addInputField()">
                        </div>
                        <?php
                            if($exec_vrtopt -> num_rows > 0){
                                while ($rowCurrentOpt = mysqli_fetch_array($exec_vrtopt)) {
                                    echo '<div class="flex-rowdirection">';
                                    echo '<div class="input">
                                            <input type="hidden" name="current_option_id[]" value="' . $rowCurrentOpt['vrtopt_id'] . '">
                                            <div class="inp">
                                                <input id="' . $page . '_name" type="text" name="current_option_name[]" placeholder="Option name" required value="' . $rowCurrentOpt['option_value'] . '">
                                            </div>
                                        </div>
                                        <a href="process/del_process.php?vrtoptionID=' . $rowCurrentOpt['vrtopt_id'] . '" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                    echo '</div>';
                                }
                            }

                            ?>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Save All Option" name="submit_<?=$page?>">
                </div>
            </div>
        </form>
    </div>
<?php } ?>