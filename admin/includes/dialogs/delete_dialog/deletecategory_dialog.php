<div class="dialog_container">
    <div id="dialog_header">
        <h1> Delete Category </h1>
    </div>
    <div id="dialog_body">
        <div class="dialog_message">
            <p> Are you sure you want to delete <span style="color: red"><?= $rowCat['ctg_name'] ?></span></p>
        </div>
        <div class="dialog_action">
            <a href="process/del_process.php?categoryID=<?= $rowCat['ctg_id'] ?>" class="defaultbtn enabledbtn"> CONFIRM </a>
            <a class="close_dialog defaultbtn cancelbtn"> CANCEL </a>
        </div>
    </div>
</div>