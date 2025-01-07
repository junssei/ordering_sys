<?php
session_start();
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <div id="hero_section">
            <a href="product.php" class="button1 btn"> View Products </a>
        </div>
        <div id="category_section">
            <h2> Categories </h2>
            <div class="display_section">
            <?php 
            $fetch = "SELECT * FROM product_category";
            $query = mysqli_query($conn, $fetch);
            while ($row = mysqli_fetch_array($query)) { ?>
                <a href="product.php?category=<?=$row['ctg_id']?>" class="category_card">
                    <img src="../source/images/upload/categories/<?=$row['ctg_img']?>" class="iconLarge" alt="category_icon">
                    <p> <?=$row['ctg_name']?> </p>
                </a>
            <?php } ?>
            </div>
        </div>
        <div id="product_section">
            <h2> Popular </h2>
            <div class="display_section">
                <!-- <?php 
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
                    <a class="button1 btn1" onclick="addtoCart('product', <?=$row['product_id']?>)"><img src="../source/images/icon/svg/addtocart_icon.svg"> Add to Cart </a>
                </div>
                <?php } ?> -->
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
<?php
include "include/footer.php";
?>