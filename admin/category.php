<?php
session_start();
$title = "Category";
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
            <?php include 'includes/indexheader.php'; ?>
            <div id="content">
                <div id="content_header">
                    <p id="breadcrumbs"> <?php echo "Inventory/" . $currentPage; ?> </p>
                    <div id="contentheader_actions">
                        <button class="defaultbtn" onclick="addModal('category')"> Add </button>
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

                                while ($rowCategory = mysqli_fetch_array($exec_ctg)) {
                                    echo "<tr class='table_rows'>";
                                    echo "<td>" . $rowCategory['ctg_id'] . "</td>";
                                    echo "<td>" . $rowCategory['ctg_name'] . "</td>";
                                    echo '<td class="action_col">
                                    <a href="' . $rowCategory['ctg_id'] . '"><img src="../source/images/icon/svg/edit.svg" alt="edit" class="editbtn"></a>

                                    <a href="process/delete.php?categoryID='. $rowCategory['ctg_id'] . '"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
                                    echo '</tr>';
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