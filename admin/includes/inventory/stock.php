<div id="body">
    <?php 
    include 'includes/indexheader.php';
    ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Stock"?> </p>
        </div>
        <?php 
        // include 'includes/add_dialog.php';
        ?>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body">
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Stock </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search">
                        </div>
                        <button class="smallbtn" onclick="addModal('product')"> + Stock </button>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> Product ID </th>
                            <th> SKU </th>
                            <th> Product Name </th>
                            <th> Price </th>
                            <th> Stock </th>
                            <th></th>
                        </tr>
                        <?php
                            $fetchProducts = "CALL GetAllProductVariation()";
                            $exec_prd = mysqli_query($conn, $fetchProducts);
    
                            if($exec_prd -> num_rows > 0){
                                while ($rowProducts = mysqli_fetch_array($exec_prd)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td><img src='../source/images/upload/products/" . $rowProducts['image'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowProducts['product_id'] . "</td>";
                                    echo "<td>" . $rowProducts['sku'] . "</td>";
                                    echo "<td>" . $rowProducts['name'] . "</td>";
                                    echo "<td>" . $rowProducts['price'] . "</td>";
                                    echo "<td>" . $rowProducts['stock'] . "</td>";
                                    echo '<td class="action_col"> 
                                    <a onclick="editModal(' . "'product_variation'," . $rowProducts['product_id'] . ')" class="editbtnlink link"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'product_variation'," . $rowProducts['variation_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr class='table_rows'><td colspan='7' align='center'>No records found</td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>