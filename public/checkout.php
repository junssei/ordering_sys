<?php
session_start();
$title = "Checkout";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <form class="checkout_container" method="POST" action="process/payment_process.php" class="">
            <?php
            if(isset($_POST['cartitemID'])){
                $cartitemID = $_POST['cartitemID'];
            ?>
            <div class="checkout_subcontainer">
                <div class="checkout_body">
                    <div class="checkout_header">
                        <h2> Checkout </h2>
                    </div>
                    <?php
                    $totalAmount = 0;
                    foreach($cartitemID as $index => $value){ ?>
                    <div class="product_item">
                        <?php
                            $quantity = $_POST['quantity'][$index];
                            $variationID = $_POST['variation'][$index];

                            $queryCart = mysqli_query($conn, "SELECT * FROM cart_item WHERE cart_item_id = $value");
                            while($row = mysqli_fetch_array($queryCart)){
                                $queryProductVariation  = mysqli_query($conn ,"SELECT * FROM product_variation LEFT JOIN product ON product_variation.product_id = product.product_id WHERE product_variation.variation_id = $variationID");
                                $rowVariation = mysqli_fetch_array($queryProductVariation, MYSQLI_ASSOC);
                                echo "<input type='hidden' name='cartItem[]' value='". $value . "'>";
                                echo "<input type='hidden' name='product[]' value='". $rowVariation['product_id'] . "'>";
                                echo "<p>" . $rowVariation['product_name'] . "</p>";

                                echo "<p>" . $rowVariation['name'] . "</p>";
                                echo "<input type='hidden' name='variation[]' value='". $rowVariation['variation_id'] . "'>";
                                
                                echo "<p> &#8369;" . $rowVariation['price'] . "</p>";
                                echo "<p> Quantity: " . $quantity . "</p>";
                                echo "<input type='hidden' name='quantity[]' value='". $quantity . "'>";
                                
                                $itemtotalPrice = ($quantity * $rowVariation['price']);
                                echo "<p> &#8369;" . $itemtotalPrice . "</p>";
                                echo "<input type='hidden' name='price[]' value='". $itemtotalPrice . "'>";
                                
                                $totalAmount = $totalAmount + $itemtotalPrice;;
                            }
                        ?>
                    </div>
                <?php   
                    }
                ?>
                </div>
            <?php
            } else {
                header("Location: cart.php");
            }
            ?>
                <div class="payment_section">
                    <h2> Total Amount: <?=  $totalAmount ?> </h2>
                    <input type="hidden" name="customerID" value="<?= $id ?>">
                    <input type="hidden" name="totalAmount" value="<?= $totalAmount ?>">
                    <div class="input">
                        <input name="payment_amount" type="number" min=1 value="1">

                    </div>
                    <select name="payment_method">
                        <option> Cash </option>
                        <option> Gcash </option>
                    </select>
                    <select name="delivery_method">
                        <option> Pickup </option>
                        <option> Delivery </option>
                    </select>
                    <div id="paypal-button-container"></div>
                    <p id="result-message"></p>
                    <input type="submit" name="submit_order" class="defaultbtn btn1 enabledbtn" value="Place Order">
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=test&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo,paylater,card"
                data-sdk-integration-source="developer-studio"></script>
            </div>
        </form>
    </div>
</div>
<?php
include "include/footer.php";
?>