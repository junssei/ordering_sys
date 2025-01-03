<?php 
require '../../source/db/connect.php';
if($_GET['value'] && $_GET['page'] == "subcategory"){
    $page = $_GET['page'];
    $sort = $_GET['sort'];
    $value = $_GET['value'];

    if($value == "all"){
        if($sort == 'oldest'){
            $fetchsubctg = "SELECT * FROM product_subcategory LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id ORDER BY product_subcategory.created_at ASC";
            $querysubctg = mysqli_query($conn, $fetchsubctg);
        } else {
            $fetchsubctg = "SELECT * FROM product_subcategory LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id ORDER BY product_subcategory.created_at DESC";
            $querysubctg = mysqli_query($conn, $fetchsubctg);
        }
    } else {
        if($sort == 'oldest'){
            $fetchsubctg = "SELECT * FROM product_subcategory LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id WHERE product_subcategory.ctg_id = $value ORDER BY product_subcategory.created_at ASC";
            $querysubctg = mysqli_query($conn, $fetchsubctg);
        } else {
            $fetchsubctg = "SELECT * FROM product_subcategory LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id WHERE product_subcategory.ctg_id = $value ORDER BY product_subcategory.created_at DESC";
            $querysubctg = mysqli_query($conn, $fetchsubctg);
        }
    }

    if($querysubctg -> num_rows > 0){
        echo '
        <table class="table">
        <tr class="table_header">
            <th> Image </th>
            <th> Name </th>
            <th> Category </th>
            <th></th>
        </tr>';
        while ($rowSubctg = mysqli_fetch_array($querysubctg)) {
            echo '<tr class="table_rows" onclick="' ."editModal('subcategory', {$rowSubctg['subctg_id']})" . '">';
            echo "<td><img src='../source/images/upload/categories/" . $rowSubctg['subctg_img'] . "' class='imageSmall'></td>";
            echo "<td>" . $rowSubctg['subctg_name'] . "</td>";
            echo "<td>" . $rowSubctg['ctg_name'] . "</td>";
            echo '<td class="action_col">
            <a onclick="deltModal(' . "'subcategory'," . $rowSubctg['subctg_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
            echo '</tr>';
        }
        echo "</table>";
    } else {
        echo '
        <table class="table">
        <tr class="table_header">
            <th> Image </th>
            <th> Name </th>
            <th> Category </th>
            <th></th>
        </tr>';
        echo "<tr class='table_rows'><td colspan='7' align='center'>No records found</td></tr>";
        echo "</table>";
    }
}

if($_GET['page'] == "category"){
    $page = $_GET['page'];
    $sort = $_GET['sort'];

    if($sort == 'oldest'){
        $fetch = "SELECT * FROM product_{$page} ORDER BY created_at ASC";
        $query = mysqli_query($conn, $fetch);
    } else {
        $fetch = "SELECT * FROM product_{$page} ORDER BY created_at DESC";
        $query = mysqli_query($conn, $fetch);
    }

    if($query -> num_rows > 0){
        echo '
        <table class="table">
        <tr class="table_header">
            <th> Image </th>
            <th> Name </th>
            <th></th>
        </tr>';
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr class="table_rows" onclick="' ."editModal('category', {$row['ctg_id']})" . '">';
            echo "<td><img src='../source/images/upload/categories/" . $row['ctg_img'] . "' class='imageSmall'></td>";
            echo "<td>" . $row['ctg_name'] . "</td>";
            echo '<td class="action_col"> 
            <a onclick="deltModal(' . "'category'," . $row['ctg_id'] . ')" class="deletebtnlink"><img src="../source/images/icon/svg/delete.svg" alt="delete" class="deletebtn"></a>';
            echo '</tr>';
        }
        echo "</table>";
    } else {
        echo '
        <table class="table">
        <tr class="table_header">
            <th> Image </th>
            <th> Name </th>
            <th></th>
        </tr>';
        echo "<tr class='table_rows'><td colspan='7' align='center'>No records found</td></tr>";
        echo "</table>";
    }
}
?> 