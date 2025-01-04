<?php
require '../../source/db/connect.php';
if($_GET['id']) { 
$id = $_GET['id'];
$fetch = "SELECT * FROM product WHERE product_id = $id";
$query = mysqli_query($conn, $fetch);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<div class="form_inputfield" >
    <div class="flex-rowdirection mainrowdirection">
        <div class="inputfile">
            <label class="inp inpfile">
                <img src="../source/images/upload/products/gallery.png" class="imagedisp imageMedium">
                <input class="imageupld choosefilebtn" type="file" name="uploadimgvariation[]" style="display:none" <?= $fileupload_requirement ?>>
            </label>
        </div>
        <div class="flex-coldirection flex-rowfullwidth">
            <p> <?=$row['product_name']?> <span class="tagsSmall"> P<?=$row['baseprice']?> </span></p>
            <input type="hidden" name="product_id[]" value="<?= $row['product_id'] ?>">
            <div class="flex-rowdirection">
                <div class="input">
                    <div class="inp">
                        <input id="variant_name" type="text" name="variant_name[]" placeholder="Variant Name" required>
                    </div>
                </div>
                <div class="input">
                    <div class="inp">
                        ₱
                        <input id="variant_price" type="number" name="variant_price[]" placeholder="Set Price" required min="1">
                    </div>
                </div>
                <div class="input">
                    <div class="inp">
                        <input id="variant_sku" type="text" name="variant_sku[]" placeholder="SKU (eg. EG-100)">
                    </div> 
                </div>
                <div class="input">
                    <div class="inp">
                        <input id="variant_stock" type="text" name="variant_stock[]" placeholder="Stock">
                    </div> 
                </div>
                <img src="../source/images/icon/svg/delete.svg" class="btn imageMediumSmall" alt="addanotherinput" onclick="delInputField(this)">
            </div>
        </div>
    </div>
</div>
<?php } ?>