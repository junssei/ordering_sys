<?php
session_start();
$title = "Login";
include 'includes/header.php';
?>
<div class="container">
    <div class="subcontainer">
        <img class="logoSmall" src="../source/images/logo/LogoMark2.png">
        <div class="subcontainer_header">
            <h1> Login </h1>
            <p> Login with your admin credentials </p>
        </div>
        <form class="form" action="process/auth/validation.php" method="post" autocomplete="off" autocapitalize="words">
            <!-- Input email or username -->
            <div class="input">
                <div class="inp inp_nm">
                    <img class="iconSmall" src="../source/images/icon/svg/mail.svg" alt="email_icon">
                    <input id="email" type="text" name="email" placeholder="Email or username" required <?php 
                        if (isset($_SESSION['username'])) {
                            echo "value='" . $_SESSION['username'] . "'";
                        }
                    ?>>
                </div>
            </div>
            <!-- Input password -->
            <div class="input">
                <div class="inp inp_pw">
                    <img class="iconSmall" src="../source/images/icon/svg/password.svg" alt="password_icon">
                    <input id="password" class="password_visibility" type="password" name="password" placeholder="Password" required>
                </div>
                <img id="eyepassword_icon" class="iconSmall icon_fn" src="../source/images/icon/svg/eye-invisibility.svg" onclick="passwordVisibility()" alt="password_invisibility">
            </div>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='error' style='text-align: center;'>" . $_SESSION['error'] . "</p>";
                }
            ?>
            <div class="input_actions">
                <span><a class="link" href="">Forgot Password?</a></span>
                <input class="enabledbtn defaultbtn" type="submit" value="LOGIN">
            </div>
        </form>
        <div class="subcontainer_footer">
            <span> Don't have an account? <a class="link" href="register.php"> Sign Up </a></span>
        </div>
    </div>
</div>
<?php
// session_unset();
include 'includes/footer.php';
?>