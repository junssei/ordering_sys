<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Attributes"?> </p>
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body" class="content_body_row">
            <div id="attributes" class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Attributes </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search" class="search_field" onkeyup="searchFilter('attributes')">
                        </div>
                        <button class="smallbtn" onclick="addModal('attributes')"> + Attributes </button>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> ID </th>
                            <th> Name </th>
                            <th> Options </th>
                            <th> </th>
                        </tr>
                        <?php //Display all products
                            $fetchAttributes = "SELECT * FROM attributes";
                            $exec = mysqli_query($conn, $fetchAttributes);

                            if($exec -> num_rows > 0){
                                while ($row = mysqli_fetch_array($exec)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td>" . $row['attribute_id'] . "</td>";
                                    echo "<td>" . $row['attribute_name'] . "</td>";
                                    echo "<td>";
                                    $fetchOption = "SELECT * FROM attributes_option WHERE attribute_id = {$row['attribute_id']} LIMIT 3";
                                    $execOpt = mysqli_query($conn, $fetchOption);
                                    if($exec -> num_rows > 0){
                                        while($rowOption = mysqli_fetch_array($execOpt)){
                                            echo $rowOption['opt_value'] . ", ";
                                        }
                                        echo "...";
                                    } else {
                                        echo "N/A";
                                    }
                                    echo '<a onclick="addModal2(' . "'attributes_option'," . $row['attribute_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/circleplus.svg" alt="edit" class="editbtn"></a>';
                                    echo "</td>";
                                    echo '<td class="action_col">
                                    <a onclick="editModal(' . "'attributes'," . $row['attribute_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'attributes'," . $row['attribute_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
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