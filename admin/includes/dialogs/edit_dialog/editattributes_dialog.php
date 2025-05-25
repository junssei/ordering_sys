<?php
$page = $_GET['page'];
$id = intval($_GET['id']);
$sql = "SELECT * FROM attributes WHERE attribute_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<div class="dialog_container">
    <div id="dialog_header">
        <h1> Add <?= ucwords($page) ?> <?= "#" . $row['attribute_id'] ?> </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="edit<?= $page ?>" class="dialog_form" action="process/upd_process.php" method="post" autocomplete="off">
        <div class="dialog_allinp">
            <input type="hidden" name="<?= $page ?>_id" value="<?= $row['attribute_id'] ?>">
            <div class="input">
                <div class="inp">
                    <input id="<?= $page ?>_name" type="text" name="<?= $page ?>_name" placeholder="<?= ucwords($page) ?> Name" required value="<?= htmlspecialchars($row['attribute_name']) ?>">
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Update <?= $page ?>" name="update_<?= $page ?>">
            </div>
        </div>
    </form>
</div>