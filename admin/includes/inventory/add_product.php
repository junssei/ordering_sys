<div id="body">
    <?php 
    include 'includes/indexheader.php';
    ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Add Product"?> </p>
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body" class="content_body_row" onload="displayImageModal()">
            <div class="form_container">
                <div class="form_header">
                    <h1> Add Product </h1>
                    <p> The "Add Product" feature lets you add new items. You can include basic details such as the product name, price, and stock quantity to help you manage and track your items easily. </p>
                </div>
                <form id="addproduct" class="form_body" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form_inputfield">
                        <div class="flex-rowdirection">
                            <input type="hidden" name="admin_id" value="<?=$_SESSION['admidID'] ?>">
                            <div class="inputfile" style="border: none"; >
                                <img src="../source/images/upload/products/gallery.png" class="imagedisp imageExtraLarge">
                                <div class="inp inpfile">
                                    <input class="imageupld choosefilebtn" type="file" name="uploadimgproduct" <?= $fileupload_requirement ?>>
                                </div>
                                <div class="input_textarea">
                                    <div class="input_inptextarea">
                                        <textarea name="product_description" placeholder="Description..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-coldirection flex-rowfullwidth">
                                <div class="flex-rowdirection">
                                    <div class="input">
                                        <div class="inp">
                                            <input id="product_name" type="text" name="product_name" placeholder="Product Name" required>
                                        </div>
                                    </div>
                                    <div class="input">
                                        <div class="inp">
                                            <input id="product_brand" type="text" name="product_brand" placeholder="Product Brand">
                                        </div> 
                                    </div>
                                </div>
                                <div class="flex-coldirection">
                                    <div class="input">
                                        <div class="inp">
                                            ₱
                                            <input id="product_price" type="number" name="product_price" placeholder="Set Base Price" required min="1">
                                        </div>
                                    </div>
                                    <!-- Category -->
                                    <div class="flex-rowdirection flex-rowfullwidth">
                                        <!-- <label for="product_category"> Category </label> -->
                                        <div class="input_select">
                                            <select name="product_category" required onchange="ctgDISPsubctg(this.value)" class="input_category">
                                                <option value="" disabled selected hidden>Choose a category</option>
                                                <?php
                                                $fetchcategory = "SELECT * FROM product_category";
                                                $exec = mysqli_query($conn, $fetchcategory);
                                                while ($fetchcategory = mysqli_fetch_array($exec)) {
                                                        echo "<option value='" . $fetchcategory['ctg_id'] . "'>" . $fetchcategory['ctg_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Subcategory -->
                                    <div class="flex-rowdirection flex-rowfullwidth">
                                        <!-- <label for="product_subcategory"> Subcategory </label> -->
                                        <div class="input_select">
                                            <select name="product_subcategory" required class="input_subcategory">
                                            <option value="" disabled selected hidden>Choose a subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Attributes
                                    <div class="flex-rowdirection">
                                        <div class="input_select">
                                            <select name="product" required class="select_product_attribute">
                                                <option value="" disabled selected hidden>Choose a attribute </option>
                                                <option value=""> None </option>
                                                <?php
                                                $fetch = "SELECT * FROM attributes";
                                                $exec = mysqli_query($conn, $fetch);
                                                while ($row = mysqli_fetch_array($exec)) {
                                                        echo "<option value='" . $row['attribute_id'] . "'>" . $row['attribute_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <a class="defaultbtn" onclick="addAttributeField('attribute')"> + Attribute </a>
                                    </div>
                                    <div id="multiple_attribute_field">
                                        <div class="flex-coldirection">
                                            <p class="fontsizeMedium"> This product have a [name of the attribute] </p>
                                            <div class="flex-rowdirection">
                                            <?php
                                            $fetch = "SELECT * FROM attributes_option WHERE attribute_id = 8";
                                            $exec = mysqli_query($conn, $fetch);
                                            while ($row = mysqli_fetch_array($exec)) {
                                                echo '<input type="checkbox" id="' . $row['attributeopt_id'] . '" name="attribute[]" value="' . $row['opt_value'] . '">';
                                                echo '<label for="attribute">' . $row['opt_value'] . '</label><br>';
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="input_actions">
                            <input class="enabledbtn defaultbtn" type="submit" value="Add Product" name="submit_product">
                        </div>
                    </div>
                </form>
            </div>
            <div id="variant" class="form_container">
                <div class="form_header">
                    <h1> Add Variant </h1>
                    <p> You can only add a variant to a product if the product already exists in your product list. </p>
                </div>
                <form id="add_variant" class="form_body" action="process/add_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="flex-rowdirection">
                        <div class="input_select">
                            <select name="product" required class="select_product_variant">
                                <option value="" disabled selected hidden>Choose a product</option>
                                <option value=""> None </option>
                                <?php
                                $fetch = "SELECT * FROM product";
                                $exec = mysqli_query($conn, $fetch);
                                while ($row = mysqli_fetch_array($exec)) {
                                        echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <a class="defaultbtn enabledbtn" onclick="addVariationField('variant')"> + Variant </a>
                    </div>
                    <div id="multiple_variant_field">
                        
                    </div>
                    <div class="input_actions">
                        <input class="enabledbtn defaultbtn" type="submit" value="Save All Variant" name="submit_variant">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>