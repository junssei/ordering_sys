<?php
$title = "Bigcas";
include "include/header.php"
?>
<div id="body_container">
    <div id="body_subcontainer">
        <div class="user_container">
            <div class="quickaccess_menu">
                <h1> Quick Access </h1>
                <a href="about.php?b=contact"><img src="../source/images/icon/svg/information-circle-contained.png" alt="icon"><span> Contact </span></a>
                <a href="about.php?b=aboutus"><img src="../source/images/icon/svg/information-circle-contained.png" alt="icon"><span> About us </span></a>
                <a href="about.php?b=privacypolicy"><img src="../source/images/icon/svg/privacypolicy.svg" alt="icon"><span> Privacy Policy </span></a>
                <a href="about.php?b=termsncondition"><img src="../source/images/icon/svg/tnc.svg" alt="icon"><span> Terms and Condition </span></a>
            </div>
            <div class="user_subcontainer">
                <?php
                if ($_GET['b'] == "contact") {
                    include 'include/about/contact.php';
                }

                if ($_GET['b'] == "aboutus") {
                    include 'include/about/us.php';
                }


                if ($_GET['b'] == "privacypolicy") {
                    include 'include/about/privacypolicy.php';
                }

                if ($_GET['b'] == "termsncondition") {
                    include 'include/about/termsncondition.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>