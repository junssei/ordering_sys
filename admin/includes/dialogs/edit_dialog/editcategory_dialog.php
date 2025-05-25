<?php
$page = $_GET['page'];
$cid = intval($_GET['id']);
$sql = "SELECT * FROM product_category WHERE ctg_id = '$cid'";
$result = mysqli_query($conn, $sql);
$rowCat = mysqli_fetch_array($result);
?>
<div class="dialog_container">
    <div id="dialog_header">
        <h1> Edit <?= ucwords($page) ?> <?= "#" . $rowCat['ctg_id'] ?> </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="editcategory" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_imginp">
            <input type="hidden" name="<?= $page ?>_id" value="<?= $rowCat['ctg_id'] ?>">
            <div class="inputfile" style="border: none;">
                <img src="../source/images/upload/categories/<?= htmlspecialchars($rowCat['ctg_img']) ?>" class="imagedisp imageLarge">
                <div class="inp inpfile">
                    <input class="imageupld choosefilebtn" type="file" name="uploadimg<?= $page ?>" <?= $fileupload_requirement ?>>
                </div>
            </div>
        </div>
        <div class="dialog_allinp">
            <div class="input">
                <div class="inp">
                    <input type="hidden" name="category_id" value="<?= $rowCat['ctg_id'] ?>">
                    <input id="product_name" type="text" name="<?= $page ?>name" placeholder="Product Name" required value="<?= htmlspecialchars($rowCat['ctg_name']) ?>">
                </div>
            </div>
            <div class="input_textarea">
                <div class="input_inptextarea">
                    <textarea name="<?= $page ?>description" placeholder="Description..."><?= htmlspecialchars($rowCat['ctg_desc']) ?></textarea>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Update <?= $page ?>" name="update_<?= $page ?>">
            </div>
        </div>
    </form>
</div>