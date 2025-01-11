<div class="cart_container">
    <form class="cart_subcontainer" method="post" action="checkout.php">
        <div class="cart_row">
            <div class="cart_section">
                <div class="cart_header">
                    <h2> (<?=$count?>) Cart </h2>
                    <p><input type="checkbox" onchange="selects(this, 'cartitemID')"> SELECT ALL</p>
                </div>
                <div id="cart_items">
                <?php
                if(isset($id)){
                $fetchCart = "SELECT * FROM cart_item LEFT JOIN cart ON cart_item.cart_id = cart.cart_id WHERE cart.customer_id = $id";
                $exec = mysqli_query($conn, $fetchCart);
                    if($exec -> num_rows > 0){
                        while ($row = mysqli_fetch_array($exec)) {
                            $fetchProduct = "SELECT *, product_variation.image AS image, 
                            product.product_id AS productID, product.product_name AS productName, 
                            product.image AS productImg, product_variation.price AS productPrice 
                            FROM product LEFT JOIN product_variation ON product.product_id = product_variation.product_id WHERE product.product_id = {$row["product_id"]}";
                            $queryProduct = mysqli_query($conn, $fetchProduct);
                            $rowPRD = mysqli_fetch_array($queryProduct, MYSQLI_ASSOC); ?>
                            <div class="cart_item">
                                <div class="item_information">
                                    <div class="item_img">
                                        <input type="checkbox" name="cartitemID[]" value="<?= $row["cart_item_id"] ?>">
                                        <img src="../source/images/upload/products/<?=$rowPRD['image']?>" class="imageMedium">
                                    </div>
                                    <div class="item_details">
                                        <span class="product_name">  <?=$rowPRD['productName']?> </span>
                                        <span class="product_price"> &#8369;<?=$rowPRD['productPrice']?> </span>
                                    </div>
                                </div>
                                <div class="item_variation">
                                    <select name="variation[]" onchange="updateCart()">
                                        <?php 
                                            $fetchVariation = "SELECT * FROM product_variation WHERE product_id = {$row["product_id"]}";
                                            $queryVariation = mysqli_query($conn, $fetchVariation);
                                            while ($rowVariation = mysqli_fetch_array($queryVariation)) {
                                                if($rowVariation['variation_id'] == $row['variation_id']){
                                                    echo "<option value='" . $rowVariation['variation_id'] . "' selected>" . $rowVariation['name'] . "</option>";   
                                                } else {
                                                    echo "<option value='" . $rowVariation['variation_id'] . "'>" . $rowVariation['name'] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="item_actions">
                                    <img src="../source/images/icon/svg/delete.svg" class="deletebtn" alt="deleteicon" onclick="deleteCart(<?=$row['cart_item_id']?>, <?=$id?>)">
                                    <div class="input inputnumber">
                                        <span class="decr"> - </span>
                                        <input type="number" value="<?=$row['quantity']?>" min=1 name="quantity[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                        <span class="incr"> + </span>
                                    </div>
                                </div>
                            </div>
                <?php   }
                        
                                            
                    } else {
                        echo '<p class="reminder"> No Products </p>';
                    }
                } else {
                    echo '<div class="reminderwimage"><img src="../source/images/logo/LogoMark2.png" class="logoSmall"><p> Please log in </p>
                    </div>';
                }
                ?>
                </div>
            </div>
            <div class="checkout_section">
                <div class="checkoutsection_header">
                    <h2> Checkout </h2>
                    <p> Total Amount: &#8369; <span id="totalAmount"> 0 </span> </p>
                </div>
                <input type="submit" value="Checkout">
            </div>
        </div>
        <!-- Product -->
        <div id="product_section">
            <h2> You may also like </h2>
            <div class="display_section">
                <?php 
                $fetch = "SELECT * FROM product";
                $query = mysqli_query($conn, $fetch);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <!-- <div class="product_card">
                    <a href="">
                        <div class="card_image">
                            <img src="../source/images/upload/products/<?=$row['image']?>" alt="product_image" class="card_imageS">
                        </div>
                        <p class="product_details">
                            <span class="product_name"> <?=$row['product_name']?> </span>
                            <span class="product_price"> &#8369;<?=$row['baseprice']?> </span>
                        </p>
                    </a>
                    <a class="button1 btn1" onclick="addtoCart(<?=$row['product_id']?>)"><img src="../source/images/icon/svg/addtocart_icon.svg"> Add to Cart </a>
                </div> -->
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
    </form>
</div>