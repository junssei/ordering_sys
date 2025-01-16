<?php
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <div class="user_container">
            <div class="quickaccess_menu">
                <h1> Quick Access </h1>
                <a href="user.php?u=cart"><img src="../source/images/icon/svg/Cart.svg" alt="icon"><span> My Cart </span></a>
                <a href="user.php?u=orders"><img src="../source/images/icon/svg/box.svg" alt="icon"><span> My Orders </span></a>
                <a href="user.php?u=profile"><img src="../source/images/icon/svg/user-profile-01.svg" alt="icon"><span> My Account </span></a>
                <a href="user.php?u=address"><img src="../source/images/icon/svg/marker-02.svg" alt="icon"><span> My Addresses </span></a>
                <a href="user.php?u=wishlist"><img src="../source/images/icon/svg/heart.svg" alt="icon"><span> Wishlist </span></a>
            </div>
            <div class="user_subcontainer">
                <?php
                if ($_GET['u'] == 'cart') {
                    include 'include/users/mycart.php';
                }

                if ($_GET['u'] == 'orders') {
                    include 'include/users/myorders.php';
                }

                if ($_GET['u'] == 'profile') {
                    include 'include/users/myprofile.php';
                }


                ?>
            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>