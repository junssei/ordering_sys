<?php require '../source/db/connect.php';

if(!isset($_SESSION['userloggedin'])) {
    $loggedin = false;
    $id = 0;
} else {
    $loggedin = true;
    $id = $_SESSION['customerID'];
}

$defaultpage = basename($_SERVER['REQUEST_URI']);
$currentPage = basename($_SERVER['REQUEST_URI'], ".php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../source/images/icon/newicon3.png">
    <title> <?= $title ?> </title>
    <?php include '../source/css/public/manage_css.php'; ?>
</head>
<body>
<?php
if (isset($_SESSION['notification'])){
    echo "<div class='popupnotification'><p>" . $_SESSION['notification'] . "</p></div>";
    unset($_SESSION['notification']);
}
?>
<div id="container">
    <div id="subcontainer">
        <header>
            <div id="sub_header">
                <div id="header_navigation">
                    <a href="index.php">
                        <img src="../source/images/logo/DefaultWordmark.png" class="wordLogoSmall" alt="logo">
                    </a>
                    <nav>
                        <a href="index.php" class="<?php if($currentPage === "index"){ echo "active"; } ?>" > Home </a>
                        <a href="product.php"> Products </a>
                        <a href=""> Contact </a>
                        <a href="order.php"> Order </a>
                    </nav>
                </div>
                <div id="header_userside">
                    <div class="userside_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search" class="search_field" onkeyup="searchFilter('variation')">
                        </div>
                        <div id="notification">
                            <img src="../source/images/icon/svg/notification.svg" alt="notification">
                        </div>
                        
                        <a href="cart.php" class="userside_basket">
                            <!-- fetch cart -->
                             <?php
                                if(isset($id)){
                                    $fetchUserCart = "SELECT * FROM cart_item LEFT JOIN cart ON cart_item.cart_id = cart.cart_id WHERE cart.customer_id = $id";
                                    $querycart = mysqli_query($conn, $fetchUserCart);
                                    $count = mysqli_num_rows($querycart);
                                    echo "<span id='cart_count'> $count </span>";
                                }
                             ?>
                            <img src="../source/images/icon/svg/basket3.svg" class="iconLarge" alt="cart">
                            <div id="basket_products">
                                
                            </div>
                        </a>
                    </div>
                    <div class="userside_actions">
                        <?php if(!$loggedin) { ?>
                        <a href="login.php?auth=login" class="button2 btn"> Login </a>
                        <a href="login.php?auth=register" class="button1 btn"> Sign-up </a>
                        <?php } else {
                            $sql = "SELECT * FROM customer WHERE customer_id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                        ?>                        
                        <div id="profile_section">
                            <div id="user_image">
                                <img src="../source/images/upload/profile/<?php if(!empty($row["image"])) { echo $row["image"]; } else { echo "default.jpg"; } ?>" alt="avatar">
                            </div>
                            <div id="user_profile">
                                <div id="userprofile_header">
                                    <div>
                                        <img src="../source/images/upload/profile/default.jpg" alt="avatar">
                                        <h3 id="username"> <?php echo $row['username']; ?> </h3>
                                        <p id="email"> <?php echo $row['email']; ?> </p>
                                    </div>
                                    <a href="users.php?page=profile" class="button3 roundbtn"> Manage your profile </a>
                                </div>
                                <div id="userprofile_actions">
                                <a href="logout.php" class="defaultbtn cancelbtn"> Signout </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </header>