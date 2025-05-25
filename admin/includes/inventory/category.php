<div id="body">
    <?php include 'includes/indexheader.php'; ?>
    <div id="content">
        <div id="content_header">
            <p id="breadcrumbs"> <?php echo "Inventory/Categories"?> </p>
        </div>
        <dialog id="dialog" class="dialog"></dialog>
        <div id="content_body" class="content_body_row">
            <div id="category" class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Category </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input class="search_field" type="text" placeholder="Search" onkeyup="searchFilter('category')">
                        </div>
                        <button class="smallbtn" onclick="addModal('category')"> + Category </button>
                    </div>
                </div>
                <div class="tablefilter_header">
                    <div class="select_filter">
                        <select class="sort_chronological" name="sort" onchange="filterTable('category')">
                            <option value="newest"> Newest </option>
                            <option value="oldest"> Oldest </option>
                        </select>
                    </div>
                </div>
                <div id="categorytable" class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> Name </th>
                            <th> </th>
                        </tr>
                        <?php //Display all products
                            $fetchCategory = "SELECT * FROM product_category ORDER BY created_at DESC";
                            $exec_ctg = mysqli_query($conn, $fetchCategory);
    
                            if($exec_ctg -> num_rows > 0){
                                while ($rowCtg = mysqli_fetch_array($exec_ctg)) {
                                    echo '<tr class="table_rows" onclick="' ."editModal('category', {$rowCtg['ctg_id']})" . '">';
                                    echo "<td><img src='../source/images/upload/categories/" . $rowCtg['ctg_img'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowCtg['ctg_name'] . "</td>";
                                    echo '<td class="action_col"> 
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
            <div id="subcategory" class="maincontainer">
                <div class="tablecontainer_header">
                    <h2> Subcategory </h2>
                    <div class="tablecontainerheader_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input class="search_field" type="text" placeholder="Search" onkeyup="searchFilter('subcategory')">
                        </div>
                        <button class="smallbtn" onclick="addModal('subcategory')"> + Subcategory </button>
                    </div>
                </div>
                <div class="tablefilter_header">
                    <div class="select_filter">
                        <select class="sort_category" name="subcategory" onchange="filterTable('subcategory')">
                            <option value="all"> All </option>
                            <?php
                            $fetchCategory = "SELECT * FROM product_category";
                            $exec = mysqli_query($conn, $fetchCategory);
                            while ($rowCategory = mysqli_fetch_array($exec)) {
                                    echo "<option value='" . $rowCategory['ctg_id'] . "'>" . $rowCategory['ctg_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="select_filter">
                        <select class="sort_chronological" name="sort" onchange="filterTable('subcategory')">
                            <option value="newest"> Newest </option>
                            <option value="oldest"> Oldest </option>
                        </select>
                    </div>
                </div>
                <div id="subcategorytable" class="tablecontainer">
                    <table class="table">
                        <tr class="table_header">
                            <th> Image </th>
                            <th> Name </th>
                            <th> Category </th>
                            <th></th>
                        </tr>
                        <?php //Display all products
                            $fetchsubctg = "CALL GetSubcategoriesWithCategory()";
                            $querysubctg = mysqli_query($conn, $fetchsubctg);
    
                            if($querysubctg -> num_rows > 0){
                                while ($rowSubctg = mysqli_fetch_array($querysubctg)) {
                                    echo '<tr class="table_rows" onclick="' ."editModal('subcategory', {$rowSubctg['subctg_id']})" . '">';
                                    echo "<td><img src='../source/images/upload/categories/" . $rowSubctg['subctg_img'] . "' class='imageSmall'></td>";
                                    echo "<td>" . $rowSubctg['subctg_name'] . "</td>";
                                    echo "<td>" . $rowSubctg['ctg_name'] . "</td>";
                                    echo '<td class="action_col">
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