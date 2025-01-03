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
                            <th> Product Name </th>
                            <th> Product Brand </th>
                            <th> Size </th>
                            <th> Stock </th>
                            <th></th>
                        </tr>
                        <?php
                            // $fetchProducts = "SELECT * FROM product";
                            // $exec_prd = mysqli_query($conn, $fetchProducts);
    
                            // if($exec_prd -> num_rows > 0){
                                
                            // } else {
                                echo "<tr class='table_rows'><td colspan='7' align='center'>No records found</td></tr>";
                            // }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>