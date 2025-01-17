<?php
session_start();
require '../../source/db/connect.php';

if (isset($_GET['type']) && $_GET['type'] == "variation") {
    $pid = intval($_GET["pid"]);
    $vid = intval($_GET['vid']);
    $uid = intval($_GET['uid']);

    $resultCart = mysqli_query($conn, "SELECT cart_id FROM cart WHERE customer_id = $uid");
    $rowCart = mysqli_fetch_assoc($resultCart);
    $cartID = $rowCart['cart_id'];

    if ($cartID) {
        $checkItem = mysqli_query($conn, "SELECT quantity FROM cart_item WHERE cart_id = $cartID AND product_id = $pid AND variation_id = $vid");
        $rowItem = mysqli_fetch_assoc($checkItem);

        if ($rowItem) {
            $newQuantity = $rowItem['quantity'] + 1;
            $updateItem = "UPDATE cart_item SET quantity = $newQuantity WHERE cart_id = $cartID AND product_id = $pid AND variation_id = $vid";
            mysqli_query($conn, $updateItem);
            $fetchUserCart = "SELECT * FROM cart_item LEFT JOIN cart ON cart_item.cart_id = cart.cart_id WHERE cart.customer_id = $pid";
            $querycart = mysqli_query($conn, $fetchUserCart);
            $count = mysqli_num_rows($querycart);
        } else {
            $resultProduct = mysqli_query($conn, "SELECT price FROM product_variation WHERE product_id = $pid AND variation_id = $vid");
            $rowProduct = mysqli_fetch_assoc($resultProduct);
            $price = $rowProduct['price'];

            if ($price) {
                $insertCart = "INSERT INTO cart_item (cart_id, product_id, variation_id, quantity, price) VALUES ('$cartID', '$pid', '$vid', '1', '$price')";
                mysqli_query($conn, $insertCart);
            }
        }

        $fetchUserCart = "SELECT * FROM cart_item LEFT JOIN cart ON cart_item.cart_id = cart.cart_id WHERE cart.customer_id = $uid";
        $querycart = mysqli_query($conn, $fetchUserCart);
        $count = mysqli_num_rows($querycart);
        echo $count;
    }
}

if (isset($_GET['cartItem'])) {
    $id = $_GET['cartItem'];
    $uid = intval($_GET['uid']);
    $queryDelete = mysqli_query($conn, "DELETE FROM cart_item WHERE cart_item_id = $id");

    $fetchUserCart = "SELECT * FROM cart_item LEFT JOIN cart ON cart_item.cart_id = cart.cart_id WHERE cart.customer_id = $uid";
    $querycart = mysqli_query($conn, $fetchUserCart);
    $count = mysqli_num_rows($querycart);

    echo $count;
}

if (isset($_GET['quantity'])) {
    $id = $_GET['quantity'];
    $value = $_GET['value'];

    $queryDelete = mysqli_query($conn, "UPDATE cart_item SET quantity = $value WHERE cart_item_id = $id");

    echo "Update Succesfully!";
}

if (isset($_GET['variation'])) {
    $id = $_GET['variation'];
    $value = $_GET['value'];
    $queryDelete = mysqli_query($conn, "UPDATE cart_item SET variation_id = $value WHERE cart_item_id = $id");

    echo "Update Succesfully!";
}

mysqli_close($conn);
