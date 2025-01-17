<?php
ob_start();
$title = "Checkout";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <form class="checkout_container" method="POST" action="process/order_process.php">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cartitemID'])) {
                $cartitemID = $_POST['cartitemID'];
            ?>
                <div class="checkout_subcontainer">
                    <div class="checkout_body">
                        <div class="checkout_header">
                            <h2> Checkout </h2>
                        </div>
                        <?php
                        $totalAmount = 0;
                        foreach ($cartitemID as $index => $value) { ?>
                            <div class="product_item">
                                <?php
                                $quantity = $_POST['quantity'][$index];
                                $variationID = $_POST['variation'][$index];

                                $queryCart = mysqli_query($conn, "SELECT * FROM cart_item WHERE cart_item_id = $value");
                                while ($row = mysqli_fetch_array($queryCart)) {
                                    $queryProductVariation  = mysqli_query($conn, "SELECT * FROM product_variation LEFT JOIN product ON product_variation.product_id = product.product_id WHERE product_variation.variation_id = {$row['variation_id']}");
                                    $rowVariation = mysqli_fetch_array($queryProductVariation, MYSQLI_ASSOC);
                                    echo "<input type='hidden' name='cartItem[]' value='" . $value . "'>";
                                    echo "<input type='hidden' name='product[]' value='" . $rowVariation['product_id'] . "'>";
                                    echo "<p>" . $rowVariation['product_name'] . "</p>";

                                    echo "<p>" . $rowVariation['name'] . "</p>";
                                    echo "<input type='hidden' name='variation[]' value='" . $rowVariation['variation_id'] . "'>";

                                    echo "<p> &#8369;" . $rowVariation['price'] . "</p>";
                                    echo "<p> Quantity: " . $row['quantity'] . "</p>";
                                    echo "<input type='hidden' name='quantity[]' value='" . $row['quantity'] . "'>";

                                    $itemtotalPrice = ($row['quantity'] * $rowVariation['price']);
                                    echo "<p> &#8369;" . $itemtotalPrice . "</p>";
                                    echo "<input type='hidden' name='price[]' value='" . $itemtotalPrice . "'>";

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
                $_SESSION['notification'] = "Please select items to checkout";
                header('Location: user.php?u=cart');
                exit();
            }
                ?>
                <div class="payment_section">
                    <h2> Total Amount: &#8369;<?= $totalAmount ?> </h2>
                    <input type="hidden" name="customerID" value="<?= $id ?>">
                    <input type="hidden" name="totalAmount" value="<?= $totalAmount ?>">
                    <div class="inputwlabel">
                        <label for="payment_amount"> Pay Amount </label>
                        <div class="input">
                            <input name="payment_amount" type="number" min=1 value="<?= $totalAmount ?>" required>
                        </div>
                    </div>
                    <div class="inputwlabel">
                        <label for="payment_method"> Payment Method </label>
                        <select name="payment_method" required>
                            <option value="" disabled selected hidden> Choose a payment method </option>
                            <option> Cash </option>
                            <option> Gcash </option>
                            <option> Paypal </option>
                        </select>
                    </div>
                    <div class="inputwlabel">
                        <label for="delivery_method"> Delivery Method </label>
                        <select name="delivery_method" required>
                            <option value="" disabled selected hidden> Choose a delivery method </option>
                            <option> Pickup </option>
                            <option> Delivery </option>
                        </select>
                    </div>
                    <div hidden>
                        <div id="paypal-button-container"></div>
                        <p id="result-message"></p>
                    </div>
                    <input type="submit" name="submit_order" class="defaultbtn btn1 enabledbtn" value="Place Order">
                    <a href="user.php?u=cart" class="defaultbtn btn1 cancelbtn"> Cancel Order </a>
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