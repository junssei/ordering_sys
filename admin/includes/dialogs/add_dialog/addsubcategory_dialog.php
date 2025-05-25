<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add <?= ucwords($page) ?> </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="addsubcategory" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_imginp">
            <div class="inputfile" style="border: none" ;>
                <img src="../source/images/upload/products/gallery.png" class="imagedisp imageLarge">
                <div class="inp inpfile">
                    <input class="imageupld choosefilebtn" type="file" name="uploadimg<?= $page ?>" <?= $fileupload_requirement ?>>
                </div>
            </div>
        </div>
        <div class="dialog_allinp">
            <div class="input">
                <div class="inp">
                    <input id="subcategory_name" type="text" name="<?= $page ?>name" placeholder="Subcategory Name" required>
                </div>
            </div>
            <div class="input_select">
                <select name="category" required>
                    <?php
                    $fetchCategory = "SELECT * FROM product_category";
                    $exec = mysqli_query($conn, $fetchCategory);
                    while ($rowCategory = mysqli_fetch_array($exec)) {
                        echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input_textarea">
                <div class="input_inptextarea">
                    <textarea name="<?= $page ?>description" placeholder="Description..."></textarea>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add <?= $page ?>" name="submit_<?= $page ?>">
            </div>
        </div>
    </form>
</div>