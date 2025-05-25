<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add <?= $row['attribute_name'] ?> Option </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="add_<?= $page ?>" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_allinp">
            <input type="hidden" name="<?= $page ?>_attributeID" value="<?= $row['attribute_id'] ?>">
            <div class="flex-rowdirection">
                <div id="multiple_input_container"> <!-- Where all input added -->
                    <?php
                    $fetchCurrentOption = "SELECT * FROM attributes_option WHERE attribute_id = {$row['attribute_id']} ORDER BY attributeopt_id DESC";
                    $exec = mysqli_query($conn, $fetchCurrentOption);
                    ?>
                    <div class="flex-rowdirection">
                        <div class="input">
                            <div class="inp">
                                <input id="<?= $page ?>_name" type="text" name="<?= $page ?>_name[]" placeholder="Option name" <?php if ($exec->num_rows < 0) { ?> required <?php } ?>>
                            </div>
                        </div>
                        <img id="addinputfield" src="../source/images/icon/svg/addanother.svg" class="btn imageMediumSmall" alt="addanotherinput" onclick="addInputField('<?= $page ?>')">
                    </div>
                    <?php
                    if ($exec->num_rows > 0) {
                        while ($rowCurrentOpt = mysqli_fetch_array($exec)) {
                            echo '<div class="flex-rowdirection">';
                            echo '<div class="input">
                                    <input type="hidden" name="option_id[]" value="' . $rowCurrentOpt['attributeopt_id'] . '">
                                    <div class="inp">
                                        <input id="' . $page . '_name" type="text" name="option_name[]" placeholder="Option name" required value="' . $rowCurrentOpt['opt_value'] . '">
                                    </div>
                                </div>
                                <a href="process/del_process.php?attribute_optionID=' . $rowCurrentOpt['attributeopt_id'] . '" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Save All Option" name="submit_<?= $page ?>">
            </div>
        </div>
    </form>
</div>