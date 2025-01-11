<?php
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <div class="products_container">
            <div class="categoryfilter_section">
                <div class="filter_section">
                    <h2> Categories </h2>
                    <ul class="filter_categories">
                        <li>
                            <input type="checkbox" onchange="selects(this, 'category')">
                            <label for="category"> All </label>
                        </li>
                    <?php 
                    $fetch = "SELECT * FROM product_category";
                    $query = mysqli_query($conn, $fetch);
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <li>
                            <input type="checkbox" name="category[]" value="<?=$row['ctg_id']?>">
                            <label for="category"> <?=$row['ctg_name']?> </label>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="product_section">
                <div class="filter_section">
                    <div class="select_filter">
                        <select class="sort_chronological" name="sort" onchange="filterTable('subcategory')">
                            <option value="newest"> Newest </option>
                            <option value="oldest"> Oldest </option>
                        </select>
                    </div>
                    <div class="filtersection_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input class="search_field" type="text" placeholder="Search" onkeyup="searchFilter('subcategory')">
                        </div>
                    </div>
                </div>
                <div class="display_section">
                    <?php 
                    $fetch = "SELECT * FROM product";
                    $query = mysqli_query($conn, $fetch);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="product_card">
                        <a href="">
                            <div class="card_image">
                                <img src="../source/images/upload/products/<?=$row['image']?>" alt="product_image" class="card_imageS">
                            </div>
                            <p class="product_details">
                                <span class="product_name"> <?=$row['product_name']?> </span>
                                <span class="product_price"> &#8369;<?=$row['baseprice']?> </span>
                            </p>
                        </a>
                        <a class="button1 btn1" onclick="addtoCart('variation', <?=$row['product_id']?>, 1, <?=$id?>)"><img src="../source/images/icon/svg/addtocart_icon.svg"> Add to Cart </a>
                    </div>
                    <?php } ?>
                    <!-- Variation -->
                    <?php 
                    $fetch = "SELECT *, product_variation.image AS image, product.product_id AS productID, product.product_name AS productName, product.image AS productImg FROM product_variation LEFT JOIN product ON product.product_id = product_variation.product_id";
                    $query = mysqli_query($conn, $fetch);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="product_card">
                        <a href="" class="card_content">
                            <div class="card_image">
                                <img src="../source/images/upload/products/<?=$row['image']?>" alt="product_image" class="card_imageS">
                            </div>
                            <p class="product_details">
                                <span class="product_name"> <?=$row['name']?> <?=$row['productName']?> </span>
                                <span class="product_price"> &#8369;<?=$row['price']?> </span>
                            </p>
                        </a>
                        <a class="button1 btn1" onclick="addtoCart('variation', <?=$row['productID']?>, <?=$row['variation_id']?>, <?=$id?>)"><img src="../source/images/icon/svg/addtocart_icon.svg"> Add to Cart </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>