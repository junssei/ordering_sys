<?php require '../../source/db/connect.php';
    if(isset($_GET['uid'])){
    $id = $_GET['uid'];
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
                        <select name=variation[]>
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
                        <div class="input">
                            <input type="number" value="<?=$row['quantity']?>" min=1 name="quantity[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                        </div>
                    </div>
                </div>
    <?php   }
        } else {
            echo "<tr class='table_rows'><td colspan='7' align='center'> No Products </td></tr>";
        }
    } else {
        echo "<tr class='table_rows'><td colspan='7' align='center'> No Products </td></tr>";
    }
?>