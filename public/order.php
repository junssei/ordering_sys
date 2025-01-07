<?php
session_start();
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <div class="order_container">
            <div class="order_subcontainer">
                <h1> Your Order </h1>
                <?php if(isset($id)){ ?>
                <div class="order_orderlist">
                    <?php
                    $fetchOrder = "SELECT * FROM orderp WHERE customer_id = $id";
                    $queryOrder = mysqli_query($conn, $fetchOrder);
                    $count = 1;

                    if($queryOrder -> num_rows > 0){
                        while($row = mysqli_fetch_array($queryOrder)){
                        ?>
                        <div class="order_item">
                            <div class="orderitem_header">
                                <span> Order #<?=$row['order_id']?> </span>
                                <span class="status"> 
                                    <?php 
                                    if($row['status'] == 0){
                                        echo "Pending";
                                    } else if ($row['status'] == 1){
                                        echo "Order Confirmed";
                                    }
                                    ?>
                                </span>
                            </div>
                        <?php
                            $fetchOrderProduct = "SELECT * FROM order_product WHERE order_id = {$row['order_id']}";
                            $queryOrderProduct = mysqli_query($conn, $fetchOrderProduct);
                            while($row = mysqli_fetch_array($queryOrderProduct)){
                                $queryProduct = mysqli_query($conn, "SELECT * FROM product LEFT JOIN product_variation ON product.product_id = product_variation.product_id WHERE product_variation.product_id = {$row['product_id']}");
                                $rowProduct = mysqli_fetch_array($queryProduct, MYSQLI_ASSOC);
                        ?>
                                <p> Product: <?= $rowProduct['product_name'] ?> </p>
                                <p> Variation: <?= $rowProduct['name'] ?> </p>
                                <p> Qty: <?= $row['quantity'] ?> </p>
                                <p> Price: <?= $row['price'] ?> </p>
                        <?php
                            }
                        ?>
                        </div>
                        <?php
                        }
                    } else {
                        echo '<p class="reminder"> No Orders </p>';
                    }
                    ?>
                </div>
                <?php } else {
                    echo '<div class="reminderwimage"><img src="../source/images/logo/LogoMark2.png" class="logoSmall"><p> Please log in </p>
                    </div>';
                }?>
            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>