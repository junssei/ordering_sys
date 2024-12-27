<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Categories"?> </p>
            <div id="contentheader_actions">
                <button class="defaultbtn" onclick="addModal('category')"> + Category </button>
            </div>
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body">
            <div class="tablecontainer">
                <table class="table">
                    <tr class="table_header">
                        <th> Category ID </th>
                        <th> Category Name </th>
                        <th> </th>
                    </tr>
                    <?php //Display all products
                        $fetchCategory = "SELECT * FROM category";
                        $exec_ctg = mysqli_query($conn, $fetchCategory);

                        if($exec_ctg -> num_rows > 0){
                            while ($rowCategory = mysqli_fetch_array($exec_ctg)) {
                                echo "<tr class='table_rows'>";
                                echo "<td>" . $rowCategory['ctg_id'] . "</td>";
                                echo "<td>" . $rowCategory['ctg_name'] . "</td>";
                                // echo '<td class="action_col">
                                // <a href="' . $rowCategory['ctg_id'] . '"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>

                                // <a href="process/delete.php?categoryID='. $rowCategory['ctg_id'] . '"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                echo '<td class="action_col"> 
                                <a onclick="editModal(' . "'category'," . $rowCategory['ctg_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>

                                <a href="process/delete.php?productID='. $rowCategory['ctg_id'] . '" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                echo '</tr>';
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