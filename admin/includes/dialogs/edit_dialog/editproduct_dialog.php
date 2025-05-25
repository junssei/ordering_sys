<?php
$page = $_GET['page'];
$pid = intval($_GET['id']);
$sql = "SELECT * FROM product WHERE product_id = '$pid'";
$result = mysqli_query($conn, $sql);

if ($rowPrd = mysqli_fetch_assoc($result)) {
?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1>Edit <?= ucwords($page) ?> <?= "#" . $rowPrd['product_id'] ?> </h1>
            <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="editproduct" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="dialog_imginp">
                <input type="hidden" name="admin_id" value="<?= $_SESSION['admidID'] ?>">
                <input type="hidden" name="<?= $page ?>_id" value="<?= $rowPrd['product_id'] ?>">
                <div class="inputfile" style="border: none;">
                    <img src="../source/images/upload/products/<?= htmlspecialchars($rowPrd['image']) ?>" class="imagedisp imageLarge">
                    <div class="inp inpfile">
                        <input class="imageupld choosefilebtn" type="file" name="uploadimg<?= $page ?>" <?= $fileupload_requirement ?>>
                    </div>
                </div>
                <div class="input">
                    <div class="inp">
                        <input id="product_name" type="text" name="<?= $page ?>_name" placeholder="Product Name" value="<?= htmlspecialchars($rowPrd['product_name']) ?>" required>
                    </div>
                </div>
                <div class="input">
                    <div class="inp">
                        <input id="product_brand" type="text" name="<?= $page ?>_brand" placeholder="Product Brand" value="<?= htmlspecialchars($rowPrd['product_brand']) ?>">
                    </div>
                </div>
                <div class="input_textarea">
                    <div class="input_inptextarea">
                        <textarea name="<?= $page ?>_description" placeholder="Description..."><?= htmlspecialchars($rowPrd['description']) ?></textarea>
                    </div>
                </div>
                <div>
                    <label for="<?= $page ?>_category"> Category </label>
                    <div class="input_select">
                        <select name="<?= $page ?>_category" required onchange="ctgDISPsubctg(this.value)" class="input_category">
                            <?php
                            $fetchSubcategory = "SELECT * FROM product_subcategory WHERE subctg_id = {$rowPrd['subctg_id']}";
                            $querySubctg = mysqli_query($conn, $fetchSubcategory);
                            $rowSubctg = mysqli_fetch_array($querySubctg, MYSQLI_ASSOC);
                            $ctgID = $rowSubctg['ctg_id'];

                            $fetchCategory = "SELECT * FROM product_category";
                            $exec = mysqli_query($conn, $fetchCategory);
                            while ($rowCategory = mysqli_fetch_array($exec)) {
                                if ($rowCategory['ctg_id'] == $ctgID) {
                                    echo "<option value='" . $rowCategory['ctg_id'] . "' selected>" . $rowCategory['ctg_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="<?= $page ?>_subcategory"> Subcategory </label>
                    <div class="input_select ">
                        <select name="<?= $page ?>_subcategory" required class="input_subcategory">
                            <?php
                            $fetchSubcategory1 = "SELECT * FROM product_subcategory WHERE ctg_id = $ctgID";
                            $querySubctg1 = mysqli_query($conn, $fetchSubcategory1);
                            while ($rowSubcategory = mysqli_fetch_array($querySubctg1)) {
                                if ($rowSubcategory['subctg_id'] == $rowPrd['subctg_id']) {
                                    echo "<option value='" . $rowSubcategory['subctg_id'] . "' selected>" . $rowSubcategory['subctg_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $rowSubcategory['subctg_id'] . "'>" . $rowSubcategory['subctg_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="input">
                    <div class="inp">
                        <input id="product_price" type="text" name="<?= $page ?>_price" placeholder="Set Price" value="<?= htmlspecialchars($rowPrd['baseprice']) ?>" required>
                    </div>
                </div>
                <div class="input_actions">
                    <input class="enabledbtn defaultbtn" type="submit" value="Update Product" name="update_<?= $page ?>">
                </div>
            </div>
            <div class="dialog_allinp">
            </div>
        </form>
    </div>
<?php
}
