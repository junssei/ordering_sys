<div class="order_container">
    <div class="order_subcontainer">
        <h1> My Orders </h1>
        <?php if($loggedin){ ?>
        <div class="order_orderlist">
            <?php
            $fetchOrder = "SELECT * FROM orderp WHERE customer_id = $id";
            $queryOrder = mysqli_query($conn, $fetchOrder);
            $count = 1;

            if($queryOrder -> num_rows > 0){
                while($row = mysqli_fetch_array($queryOrder)){
                ?>
                <div class="orderitem_container">
                    <div class="orderitem_subcontainer">
                        <div class="orderitem_header">
                            <h3> Order #<?=$row['order_id']?> </h3>
                            <div class="status_tags">
                                <span class="status"> 
                                    <?php 
                                    if($row['status'] == 0){
                                        echo "Pending";
                                    } else if ($row['status'] == 1){
                                        echo "Order Confirmed";
                                    }
                                    ?>
                                </span>
                                <span class="status"> 
                                    <?= $row['delivery_method'] ?>
                                </span>
                            </div>
                        </div>
                        <table id="orderitem_table">
                            <tr id="ordeitemtable_header">
                                <th> Product </th>
                                <th> Variation </th>
                                <th> Quantity </th>
                            </tr>
                        <?php
                            $fetchOrderProduct = "SELECT * FROM order_product WHERE order_id = {$row['order_id']}";
                            $queryOrderProduct = mysqli_query($conn, $fetchOrderProduct);
                            while($rowOrdProd = mysqli_fetch_array($queryOrderProduct)){
                                $queryProduct = mysqli_query($conn, "SELECT * FROM product LEFT JOIN product_variation ON product.product_id = product_variation.product_id WHERE product_variation.product_id = {$rowOrdProd['product_id']}");
                                $rowProduct = mysqli_fetch_array($queryProduct, MYSQLI_ASSOC);
                        ?>
                            <tr class="orderitemtable_row">
                            <td> <?= $rowProduct['product_name'] ?> <?= $rowProduct['name'] ?> </td>
                            <td> <?= $rowProduct['name'] ?> </td>
                            <td> <?= $rowOrdProd['quantity'] ?> </td>
                            <td> &#8369;<?= $rowOrdProd['price'] ?> </td>
                            </tr>
                        <?php
                            }
                        ?>
                            <tr id="ordeitemtable_footer">
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td>&#8369;<?=$row['total_amount']?></td>
                            </tr>
                        </table>
                    </div>
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