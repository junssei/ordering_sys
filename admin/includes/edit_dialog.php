<?php
require '../../source/db/connect.php';

// Product
if($_GET['page'] == "product" && $_GET['id']){
    $pid = intval($_GET['id']);
    $sql = "SELECT * FROM product WHERE prd_id = '$pid'";
    $result = mysqli_query($conn, $sql);
    
    if ($rowPrd = mysqli_fetch_assoc($result)) {
        ?>
        <div class="dialog_container">
            <div id="dialog_header">
                <h1>Edit Product</h1>
                <img class="close_dialog" src="../source/images/icon/svg/close.svg" alt="closebtn">
            </div>
            <form id="editproduct" class="dialog_form" action="process/upd_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="dialog_imginp">
                    <input type="hidden" name="product_id" value="<?= $rowPrd['prd_id'] ?>">
                    <div class="inputfile" style="border: none;">
                        <img src="../source/images/upload/products/<?= htmlspecialchars($rowPrd['prd_filename']) ?>" class="imagedisp imageLarge">
                        <div class="inp inpfile">
                            <input class="imageupld choosefilebtn" type="file" name="uploadimg1" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                </div>
                <div class="dialog_allinp">
                    <div class="input">
                        <div class="inp">
                            <input id="product_name" type="text" name="productname" placeholder="Product Name" value="<?= htmlspecialchars($rowPrd['prd_name']) ?>" required>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inp">
                            <input id="product_brand" type="text" name="productbrand" placeholder="Product Brand" value="<?= htmlspecialchars($rowPrd['prd_brand']) ?>" required>
                        </div> 
                    </div>
                    <div class="input_select">
                        <select name="productcategory" required>
                            <option>Select category:</option>
                            <?php
                            $fetchCategory = "SELECT * FROM category";
                            $exec = mysqli_query($conn, $fetchCategory);
                            while ($rowCategory = mysqli_fetch_array($exec)) {
                                if($rowCategory['ctg_id'] == $rowPrd['ctg_id']){
                                    echo "<option value='" . $rowCategory['ctg_id'] . "' selected>" . $rowCategory['ctg_name'] . "</option>";   
                                } else {
                                    echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input">
                        <div class="inp">
                            <input id="product_price" type="text" name="productprice" placeholder="Set Price" value="<?= htmlspecialchars($rowPrd['prd_price']) ?>" required>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inp">
                            <input id="product_size" type="text" name="productsize" placeholder="Set Size" value="<?= htmlspecialchars($rowPrd['prd_size']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="input_actions">
                        <input class="enabledbtn defaultbtn" type="submit" value="Update Product" name="update_product">
                    </div>
                </div>
            </form>
        </div>
        <?php 
    }
}

//Category
if($_GET['page'] == "category" && $_GET['id']){
    $cid = intval($_GET['id']);
    $sql = "SELECT * FROM category WHERE ctg_id = '$cid'";
    $result = mysqli_query($conn, $sql);
    $rowCat = mysqli_fetch_array($result);
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add Category </h1>
            <img class="close_dialog" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addcategory" class="dialog_form" action="process/add_process.php" method="post">
            <div class="input">
                <div class="inp">
                    <input id="product_name" type="text" name="categoryname" placeholder="Product Name" required value="<?= htmlspecialchars($rowCat['ctg_name']) ?>">
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add Category" name="submit_category">
            </div>
        </form>
    </div>
    <?php
}
mysqli_close($conn);