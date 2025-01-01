<div id="body">
    <?php 
    include 'includes/indexheader.php';
    ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Product List"?> </p>
            <!-- <div class="contentheader_actions">
                <button class="defaultbtn" onclick="addModal('product')"> + Product </button>
            </div> -->
        </div>
        <?php 
        // include 'includes/add_dialog.php';
        ?>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body">
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Product </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search" class="search_field" onkeyup="searchFilter('variation')">
                        </div>
                        <button class="smallbtn" onclick="addModal('product')"> + Product </button>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> Product Name </th>
                            <th> Product Brand </th>
                            <th> Subcategory </th>
                            <th> Variation </th>
                            <th> Description </th>
                            <th> Base Price </th>
                            <th></th>
                        </tr>
                        <?php //Display all products
                            $fetchProducts = "SELECT * FROM product";
                            $exec_prd = mysqli_query($conn, $fetchProducts);
    
                            if($exec_prd -> num_rows > 0){
                                while ($rowProducts = mysqli_fetch_array($exec_prd)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td><img src='../source/images/upload/products/" . $rowProducts['prd_filename'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowProducts['prd_name'] . "</td>";
                                    echo "<td>" . $rowProducts['prd_brand'] . "</td>";
                                    echo "<td>" . $rowProducts['ctg_id'] . "</td>";
                                    echo "<td>" . $rowProducts['prd_price'] . "</td>";
                                    echo '<td class="action_col"> 
                                    <a onclick="editModal(' . "'product'," . $rowProducts['prd_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'product'," . $rowProducts['prd_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
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