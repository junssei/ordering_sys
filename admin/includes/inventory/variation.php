<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Variation"?> </p>
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body" class="content_body_row">
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Variation </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search">
                        </div>
                        <button class="smallbtn" onclick="addModal('variation')"> + Variation </button>
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
                            $fetchVariation = "SELECT * FROM variation";
                            $exec_vrt = mysqli_query($conn, $fetchVariation);

                            if($exec_vrt -> num_rows > 0){
                                while ($rowVrt = mysqli_fetch_array($exec_vrt)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td>" . $rowVrt['vrt_id'] . "</td>";
                                    echo "<td>" . $rowVrt['vrt_name'] . "</td>";
                                    echo "<td>";
                                    $fetchOption = "SELECT * FROM variation_option WHERE vrt_id = {$rowVrt['vrt_id']} LIMIT 3";
                                    $execOpt = mysqli_query($conn, $fetchOption);
                                    if($exec_vrt -> num_rows > 0){
                                        while($rowOption = mysqli_fetch_array($execOpt)){
                                            echo $rowOption['option_value'] . ", ";
                                        }
                                        echo "...";
                                    } else {
                                        echo "N/A";
                                    }
                                    echo '<a onclick="addModal2(' . "'option_variation'," . $rowVrt['vrt_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/circleplus.svg" alt="edit" class="editbtn"></a>';
                                    echo "</td>";
                                    echo '<td class="action_col">
                                    <a onclick="editModal(' . "'variation'," . $rowVrt['vrt_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'variation'," . $rowVrt['vrt_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
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