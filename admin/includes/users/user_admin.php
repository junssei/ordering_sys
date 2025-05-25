<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Users/Admin"; ?> </p>
        </div>
        <div id="content_body">
            <div class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Admin </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search" class="search_field" onkeyup="searchFilter('customername')">
                        </div>
                        <button class="smallbtn" onclick="addModal('product')"> + Admin </button>
                    </div>
                </div>
                <div class="tablefilter_header">
                    <div class="select_filter">
                        <select class="sort_chronological" name="sort" onchange="filterTable('customer')">
                            <option value="newest"> Newest </option>
                            <option value="oldest"> Oldest </option>
                        </select>
                    </div>
                </div>
                <div class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Username </th>
                            <th> Email Address </th>
                            <th></th>
                        </tr>
                        <?php //Display all products
                        $fetchUsers = "CALL GetAllAdminUsers()";
                        $exec_prd = mysqli_query($conn, $fetchUsers);

                        if ($exec_prd->num_rows > 0) {
                            while ($rowUsers = mysqli_fetch_array($exec_prd)) {
                                echo "<tr class='table_rows'>";
                                echo "<td>" . $rowUsers['username'] . "</td>";
                                echo "<td>" . $rowUsers['email'] . "</td>";
                                echo '<td class="action_col"> 
                                    <a onclick="editModal(' . "'product'," . $rowUsers['admin_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                    <a onclick="deltModal(' . "'product'," . $rowUsers['admin_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                echo '</tr>';
                            }
                        } else {
                            echo "<tr class='table_rows'><td colspan='8' align='center'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>