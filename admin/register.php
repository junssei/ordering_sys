<?php
session_start();
$title = "Sign Up";
include 'includes/header.php';
?>
<div class="container">
    <div class="subcontainer">
        <img class="logoSmall" src="../source/images/logo/LogoMark2.png">
        <div class="subcontainer_header">
            <h1> Sign Up </h1>
            <p> Create an account for admin </p>
        </div>
        <form id="registrationForm" class="form" action="process/auth/registerProcess.php" method="post" autocomplete="on" autocapitalize="words">
            <div class="two_input">
                <!-- Input first name -->
                <div class="input">
                    <div class="inp inp_fnm">
                        <img class="iconSmall" src="../source/images/icon/svg/user.svg" alt="user_icon">
                        <input id="first_name" class="charlength" type="text" name="firstname" placeholder="First Name" required <?php 
                            if (isset($_SESSION['regfirstname'])) {
                                echo "value='" . $_SESSION['regfirstname'] . "'";
                            }
                        ?>>
                    </div>
                </div>
                <!-- Input last name -->
                <div class="input">
                    <div class="inp inp_lnm">
                        <!-- <img class="iconSmall" src="../source/images/icon/svg/user.svg" alt="email_icon"> -->
                        <input id="last_name" class="charlength" type="text" name="lastname" placeholder="Last Name" required <?php 
                            if (isset($_SESSION['reglastname'])) {
                                echo "value='" . $_SESSION['reglastname'] . "'";
                            }
                        ?>>
                    </div>
                </div>
            </div>
            <!-- Input email-->
            <div class="input_wmsg">
                <div class="input">
                    <div class="inp inp_ml">
                        <img class="iconSmall" src="../source/images/icon/svg/mail.svg" alt="email_icon">
                        <input id="email" type="email" name="email" placeholder="Email" required <?php 
                                if (isset($_SESSION['regemail'])) {
                                    echo "value='" . $_SESSION['regemail'] . "'";
                                }
                            ?>>
                    </div>
                </div>
                    <div>
                        <?php 
                            if (isset($_SESSION['registerEmailExist'])) {
                                echo "<p class='error' style='text-align: right;'>" . $_SESSION['registerEmailExist'] . "</p>";
                            }
                            
                        ?>
                    </div>
            </div>
            <div class="two_input">
                <!-- Input password -->
                <div class="input">
                    <div class="inp inp_pw">
                        <img class="iconSmall" src="../source/images/icon/svg/password.svg" alt="password_icon">
                        <input id="password" class="mypassword password_visibility" type="password" name="password" placeholder="Password" required>
                    </div>
                    <!-- <img id="eyepassword_icon" class="iconSmall icon_fn" src="../source/images/icon/svg/eye-invisibility.svg" onclick="passwordVisibility()" alt="password_invisibility"> -->
                </div>
                <!-- Confirm password -->
                 <div class="input_wmsg">
                     <div class="input">
                         <div class="inp inp_pw">
                             <!-- <img class="iconSmall" src="../source/images/icon/svg/password.svg" alt="password_icon"> -->
                             <input id="confirm_password" class="mypassword password_visibility" type="password" name="confirm_password" placeholder="Confirm Password">
                         </div>
                         <img id="eyepassword_icon" class="iconSmall icon_fn" src="../source/images/icon/svg/eye-invisibility.svg" onclick="passwordVisibility()" alt="password_invisibility">
                     </div>
                     <div class="message">
                         <span id="errormsg" class="error"></span>
                     </div>
                 </div>
            </div>
            <!-- Password Requirement Message -->
            <div id="message">
                <span id="letter" class="invalid"> <b>Lowercase</b> </span>
                <span id="capital" class="invalid"> <b> Uppercase </b> </span>
                <span id="number" class="invalid"> <b>Number</b></span>
                <span id="specialchar" class="invalid"> <b>Special Character</b></span>
                <span id="length" class="invalid"> Minimum <b>8 characters</b></span>
            </div>
            <?php
                if (isset($_SESSION['registerPSWerror'])) {
                    echo "<p class='error' style='text-align: center;'>" . $_SESSION['registerPSWerror'] . "</p>";
                }
            ?>
            <div class="input_actions">
                <input id="registerbtn" class="defaultbtn" type="submit" value="REGISTER" disabled>
            </div>
        </form>
        <div class="subcontainer_footer">
            <span> Already have an account? <a class="link" href="login.php"> Log In </a></span>
        </div>
    </div>
</div>
<?php
session_unset();
include 'includes/footer.php';
?>