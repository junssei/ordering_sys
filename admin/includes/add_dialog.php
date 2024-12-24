<!-- <dialog id="dialog" class="dialog"> -->
    <?php 
    // if($title == "Product") { 
    require '../../source/db/connect.php';
    ?>
    <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add Product </h1>
            <img class="close_dialog" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addproduct" class="dialog_form" action="process/addproduct.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="input">
                <div class="inp">
                    <input id="product_name" type="text" name="productname" placeholder="Product Name" required>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_brand" type="text" name="productbrand" placeholder="Product Brand" required>
                </div> 
            </div>
            <div class="input_select">
                <select name="productcategory" required>
                    <option>Select category:</option>
                    <?php
                    $fetchCategory = "SELECT * FROM category";
                    $exec = mysqli_query($conn, $fetchCategory);
                    while ($rowCategory = mysqli_fetch_array($exec)) {
                            echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_price" type="text" name="productprice" placeholder="Set Price" required>
                </div>
            </div>
            <div class="input">
                <div class="inp">
                    <input id="product_size" type="text" name="productsize" placeholder="Set Size" required>
                </div>
            </div>
            <div class="inputfile" style="border: none"; >
                <img src="../source/images/upload/products/default.png" class="imagedisp imageMedium">
                <div class="inp inpfile">
                    <input class="imageupld choosefilebtn" type="file" name="uploadimg" accept=".png, .jpg, .jpeg">
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add" name="submit_product">
            </div>
        </form>
    </div> 
    <?php 
    // } else if ($title == "Category"){ 
    ?>
    <!-- <div class="dialog_container">
        <div id="dialog_header">
            <h1> Add Category </h1>
            <img class="close_dialog" src="../source/images/icon/svg/close.svg" alt="closebtn">
        </div>
        <form id="addcategory" class="dialog_form" action="process/addcategory.php" method="post">
            <div class="input">
                <div class="inp">
                    <input id="product_name" type="text" name="categoryname" placeholder="Product Name" required>
                </div>
            </div>
            <div class="input_actions">
                <input class="enabledbtn defaultbtn" type="submit" value="Add" name="submit_category">
            </div>
        </form>
    </div>   -->
    <?php 
    // } 
    ?>
<!-- </dialog> -->