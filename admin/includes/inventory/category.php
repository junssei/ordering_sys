<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Categories"?> </p>
            <!-- <div class="contentheader_actions">
                <button class="defaultbtn" onclick="addModal('category')"> + Category </button>
            </div> -->
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body" class="content_body_row">
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Category </h2>
                    <div class="tablecontainerheader_actions">
                        <button class="defaultbtn" onclick="addModal('category')"> + Category </button>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> ID </th>
                            <th> Name </th>
                            <th> </th>
                        </tr>
                        <?php //Display all products
                            $fetchCategory = "SELECT * FROM category";
                            $exec_ctg = mysqli_query($conn, $fetchCategory);
    
                            if($exec_ctg -> num_rows > 0){
                                while ($rowCtg = mysqli_fetch_array($exec_ctg)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td><img src='../source/images/upload/categories/" . $rowCtg['ctg_img'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowCtg['ctg_id'] . "</td>";
                                    echo "<td>" . $rowCtg['ctg_name'] . "</td>";
                                    echo '<td class="action_col"> 
                                    <a onclick="editModal(' . "'category'," . $rowCtg['ctg_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'category'," . $rowCtg['ctg_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr class='table_rows'><td colspan='7' align='center'>No records found</td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Subcategory </h2>
                    <div class="tablecontainerheader_actions">
                        <button class="defaultbtn" onclick="addModal('subcategory')"> + Subcategory </button>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Category </th>
                            <th></th>
                        </tr>
                        <?php //Display all products
                            $fetchsubctg = "SELECT * FROM subcategory LEFT JOIN category ON subcategory.ctg_id = category.ctg_id";
                            $querysubctg = mysqli_query($conn, $fetchsubctg);
    
                            if($querysubctg -> num_rows > 0){
                                while ($rowSubctg = mysqli_fetch_array($querysubctg)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td><img src='../source/images/upload/categories/" . $rowSubctg['subctg_img'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowSubctg['subctg_id'] . "</td>";
                                    echo "<td>" . $rowSubctg['subctg_name'] . "</td>";
                                    echo "<td>" . $rowSubctg['ctg_name'] . "</td>";
                                    echo '<td class="action_col"> 
                                    <a onclick="editModal(' . "'subcategory'," . $rowSubctg['subctg_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'subcategory'," . $rowSubctg['subctg_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
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