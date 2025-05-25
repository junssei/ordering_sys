<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add <?= ucwords($page) ?> </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="add<?= $page ?>" class="dialog_form" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_allinp">
            <div class="input">
                <div class="inp">
                    <input id="<?= $page ?>_name" type="text" name="<?= $page ?>_name" placeholder="<?= ucwords($page) ?> Name" required>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add <?= $page ?>" name="submit_<?= $page ?>">
            </div>
        </div>
    </form>
</div>