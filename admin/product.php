<?php
session_start();
$title = "Product";
if(!isset($_SESSION['loggedin'])){
    header('Location: login.php');
    exit();
}

include 'includes/header.php';
?>
<div id="container">
    <div id="subcontainer">
        <?php include 'includes/sidebar.php'; ?>
        <div id="body">
            <?php 
            include 'includes/indexheader.php';
            ?>
            <div id="content">
                <div id="content_header">
                    <p id="breadcrumbs"> <?php echo "Inventory/" . $currentPage; ?> </p>
                    <div id="contentheader_actions">
                        <button class="defaultbtn" onclick="addModal()"> Add </button>
                    </div>
                </div>
                <?php 
                // include 'includes/add_dialog.php';
                ?>
                <dialog id="edit_dialog" class="dialog"></dialog>
                <div id="content_body">
                    <div class="tablecontainer">
                        <table class="table">
                            <tr class="table_header">
                                <th> Image </th>
                                <th> Product Name </th>
                                <th> Product Brand </th>
                                <th> Category </th>
                                <th> Price </th>
                                <th> Size </th>
                                <th></th>
                            </tr>
                            <!-- <tr class="table_rows">
                                <td> Example </td>
                                <td> Example </td>
                                <td> Example </td>
                                <td> Example </td>
                                <td> Example </td>
                                <td> Example </td>
                                <td class="action_col">
                                    <a href=""><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
                                    <a onclick="showDelModal()"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>
                                </td>
                            </tr> -->
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
                                        echo "<td>" . $rowProducts['prd_size'] . "</td>";
                                        // echo '<td class="action_col"> 
                                        // <a href="?editprd=' . $rowProducts['prd_id'] . '" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                        // <a href="process/delete.php?productID='. $rowProducts['prd_id'] . '" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                        echo '<td class="action_col"> 
                                        <a onclick="editModal(' . $rowProducts['prd_id'] . ')" class="editbtnlink"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>
    
                                        <a href="process/delete.php?productID='. $rowProducts['prd_id'] . '" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
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
</div>


<?php
include 'includes/footer.php';
?>