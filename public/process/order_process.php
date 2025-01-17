<?php
require '../../source/db/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_order'])) {
    $product_id = $_POST['product'];

    $customerID = $_POST['customerID'];
    $totalAmount = $_POST['totalAmount'];
    $paymentAmount = $_POST['payment_amount'];
    $paymentMethod = $_POST['payment_method'];
    $deliveryMethod = $_POST['delivery_method'];

    $insertOrder = "INSERT INTO orderp VALUES ('', '$customerID', CURRENT_TIMESTAMP(), 'pending', '$totalAmount', '$deliveryMethod')";
    $queryOrder = mysqli_query($conn, $insertOrder);

    $orderid = $conn->insert_id;

    foreach ($product_id as $index => $value) {
        $cartItem = $_POST['cartItem'][$index];
        $quantity = $_POST['quantity'][$index];
        $variation_id = $_POST['variation'][$index];


        $insertOrderProduct = "INSERT INTO order_product VALUES ('', '$orderid', '$value', '$variation_id', '$quantity')";
        $queryOrderproduct = mysqli_query($conn, $insertOrderProduct);

        $insertPayment = "INSERT INTO payment VALUES ('', '$orderid', CURRENT_TIMESTAMP(), '$paymentMethod', '0', NULL, '$paymentAmount')";
        $queryPayment = mysqli_query($conn, $insertPayment);

        $deleteCart = "DELETE FROM cart_item WHERE cart_item_id = $cartItem";
        $querydel = mysqli_query($conn, $deleteCart);
    }
    $_SESSION['notification'] = "Checkout succesfully! Check your orders for more details";
    header("Location: ../user.php?u=cart");
}
