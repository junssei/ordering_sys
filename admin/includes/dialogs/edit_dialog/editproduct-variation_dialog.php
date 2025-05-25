<?php
$page = $_GET['page'];
$id = intval($_GET['id']);
?>
<div class="dialog_container">
    <div id="dialog_header">
        <h1> Product Variation </h1>
        <img class="close_dialog cancelbtnimg" src="../source/images/icon/svg/close.svg" alt="closebtn">
    </div>
    <form id="add_<?= $page ?>" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="dialog_allinp">
            <div class="flex-rowdirection">
                <div id="multiple_variant_field"> <!-- Where all input added -->
                    <?php
                    $fetch = "SELECT * FROM product_variation WHERE product_id = $id ORDER BY variation_id DESC";
                    $query = mysqli_query($conn, $fetch);

                    $fetchProduct = "SELECT * FROM product WHERE product_id = $id";
                    $exec = mysqli_query($conn, $fetchProduct);
                    $row = mysqli_fetch_array($exec, MYSQLI_ASSOC);
                    ?>
                    <div class="flex-rowdirection">
                        <a class="defaultbtn enabledbtn" href="inventory.php?page=add_product"> + Variant </a>
                    </div>
                    <?php
                    if ($query->num_rows > 0) {
                        while ($rowVariation = mysqli_fetch_array($query)) { ?>
                            <div class="form_inputfield">
                                <div class="flex-rowdirection mainrowdirection">
                                    <div class="inputfile">
                                        <label class="inp inpfile">
                                            <img src="../source/images/upload/products/<?= htmlspecialchars($rowVariation['image']) ?>" class="imagedisp imageMedium">
                                            <input class="imageupld choosefilebtn" type="file" name="uploadimgvariation[]" style="display:none" <?= $fileupload_requirement ?>>
                                        </label>
                                    </div>
                                    <div class="flex-coldirection flex-rowfullwidth">
                                        <p> <?= $row['product_name'] ?> <span class="tagsSmall"> P<?= $row['baseprice'] ?> </span></p>
                                        <input type="hidden" name="variation_id[]" value="<?= $rowVariation['variation_id'] ?>">
                                        <div class="flex-rowdirection">
                                            <div class="flex-coldirection">
                                                <div class="flex-rowdirection">
                                                    <div class="input">
                                                        <div class="inp">
                                                            <input id="variant_name" type="text" name="variant_name[]" placeholder="Variant Name" required value="<?= $rowVariation['name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input">
                                                        <div class="inp">
                                                            ₱
                                                            <input id="variant_price" type="text" name="variant_price[]" placeholder="Set Price" required value=<?= $rowVariation['price'] ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-rowdirection">
                                                    <div class="input">
                                                        <div class="inp">
                                                            <input id="variant_sku" type="text" name="variant_sku[]" placeholder="SKU (eg. EG-100)" value=<?= $rowVariation['sku'] ?>>
                                                        </div>
                                                    </div>
                                                    <div class="input">
                                                        <div class="inp">
                                                            <input id="variant_stock" type="text" name="variant_stock[]" placeholder="Stock" value=<?= $rowVariation['stock'] ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="process/del_process.php?variationID='<?= $rowVariation['variation_id'] ?>'" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Save All Variation" name="update_product_variation">
            </div>
        </div>
    </form>
</div>