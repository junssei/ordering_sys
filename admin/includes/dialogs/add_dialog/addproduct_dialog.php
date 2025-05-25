<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add Product </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="addproduct" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_imginp">
            <input type="hidden" name="admin_id" value="<?= $_SESSION['admidID'] ?>">
            <div class="inputfile" style="border: none" ;>
                <img src="../source/images/upload/products/gallery.png" class="imagedisp imageLarge">
                <div class="inp inpfile">
                    <input class="imageupld choosefilebtn" type="file" name="uploadimg<?= $page ?>" <?= $fileupload_requirement ?>>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_name" type="text" name="<?= $page ?>_name" placeholder="Product Name" required>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_brand" type="text" name="<?= $page ?>_brand" placeholder="Product Brand">
                </div>
            </div>
            <div class="input_textarea">
                <div class="input_inptextarea">
                    <textarea name="<?= $page ?>_description" placeholder="Description..."></textarea>
                </div>
            </div>
            <!-- Category -->
            <div>
                <label for="<?= $page ?>_category"> Category </label>
                <div class="input_select">
                    <select name="<?= $page ?>_category" required onchange="ctgDISPsubctg(this.value)" class="input_category">
                        <option value="0"> None </option>
                        <?php
<<<<<<< HEAD
                        $fetchcategory = "SELECT * FROM product_category";
=======
                        $fetchcategory = "CALL GetAllCategories()";
>>>>>>> 9d3848ab5ee271ef87d46074b903f57f1d1dea4a
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
                <label for="<?= $page ?>_subcategory"> Subcategory </label>
                <div class="input_select ">
                    <select name="<?= $page ?>_subcategory" required class="input_subcategory">
                        <option value="none"> None </option>
                    </select>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_price" type="text" name="<?= $page ?>_price" placeholder="Set Base Price" required>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add Product" name="submit_<?= $page ?>">
            </div>
        </div>
        <div class="dialog_allinp">
        </div>
    </form>
</div>