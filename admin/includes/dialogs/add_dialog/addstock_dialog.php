<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add Stock </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="addstock" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_imginp">
            <input type="hidden" name="admin_id" value="<?= $_SESSION['admidID'] ?>">
            <div>
                <label for="<?= $page ?>_category"> Variation </label>
                <div class="input_select">
                    <select name="<?= $page ?>_category" required onchange="ctgDISPsubctg(this.value)" class="input_category">
                        <option value="0"> None </option>
                        <?php
                        $fetchvariation = "CALL GetProductwithVariations()";
                        $exec = mysqli_query($conn, $fetchvariation);
                        while ($fetchvariation = mysqli_fetch_array($exec)) {
                            echo "<option value='" . $fetchvariation['variation_id'] . "'>" . $fetchvariation['product_name'] . " - " . $fetchvariation['variation_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_price" type="number" name="<?= $page ?>_price" placeholder="Set Stock" required min="1">
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add Stock" name="submit_<?= $page ?>">
            </div>
        </div>
        <div class="dialog_allinp">
        </div>
    </form>
</div>