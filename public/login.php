<?php
session_start();
$title = "Login";
include "include/header.php"
?>
    <div class="form_section">
        <div class="form_decor">
            <a href="product.php" class="button2 btn"> View Products </a>
        </div>
    <?php if($_GET['auth'] == "login"){ ?>
        <form class="form_container" method="post" action="process/auth/validation.php" method="post" autocomplete="off" autocapitalize="words">
            <div class="form_subcontainer">
                <div class="subcontainer_header">
                    <div class="header_logo">
                        <img src="../source/images/logo/LogoMark2.png" class="logoMedium">
                    </div>
                    <h1> Login </h1>
                    <p> Login with your user credentials </p>
                </div>
                <div class="subcontainer_field">
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
                </div>
                <div class="subcontainer_footer">
                    <span> Don't have an account? <a class="link" href="login.php?auth=register"> Sign Up </a></span>
                </div>
            </div>
        </form>
    <?php } if($_GET['auth'] == "register") { ?>
        <form class="form_container" action="process/auth/registerProcess.php" method="post" autocomplete="off" autocapitalize="words">
            <div class="form_subcontainer">
                <div class="subcontainer_header">
                    <h1> Sign Up </h1>
                    <p> Create an account </p>
                </div>
                <div class="subcontainer_field">
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
                            <img class="iconSmall" src="../source/images/icon/svg/user.svg" alt="email_icon">
                            <input id="last_name" class="charlength" type="text" name="lastname" placeholder="Last Name" required <?php 
                                if (isset($_SESSION['reglastname'])) {
                                    echo "value='" . $_SESSION['reglastname'] . "'";
                                }
                            ?>>
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
                    <div class="input_wmsg">
                        <!-- Input Username -->
                        <div class="input">
                            <div class="inp inp_un">
                                <img class="iconSmall" src="../source/images/icon/svg/user.svg" alt="user_icon">
                                <input id="user_name" class="charlength" type="text" name="username" placeholder="Username" required <?php 
                                    if (isset($_SESSION['regusername'])) {
                                        echo "value='" . $_SESSION['regusername'] . "'";
                                    }
                                ?>>
                            </div>
                            <div>
                                <?php 
                                    if (isset($_SESSION['registerUserExist'])) {
                                        echo "<p class='error' style='text-align: right;'>" . $_SESSION['registerUserExist'] . "</p>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input password -->
                    <div class="input">
                        <div class="inp inp_pw">
                            <img class="iconSmall" src="../source/images/icon/svg/password.svg" alt="password_icon">
                            <input id="password" class="mypassword password_visibility" type="password" name="password" placeholder="Password" required>
                        </div>
                        <!-- <img id="eyepassword_icon" class="iconSmall icon_fn" src="../source/images/icon/svg/eye-invisibility.svg" onclick="passwordVisibility()" alt="password_invisibility"> -->
                    </div>
                    <!-- Password Requirement Message -->
                    <div id="message">
                        <span id="letter" class="invalid"> <b>Lowercase</b> </span>
                        <span id="capital" class="invalid"> <b> Uppercase </b> </span>
                        <span id="number" class="invalid"> <b>Number</b></span>
                        <span id="specialchar" class="invalid"> <b>Special Character</b></span>
                        <span id="length" class="invalid"> Minimum <b>8 characters</b></span>
                    </div>
                    <!-- Confirm password -->
                    <div class="input_wmsg">
                        <div class="input">
                            <div class="inp inp_pw">
                                <img class="iconSmall" src="../source/images/icon/svg/password.svg" alt="password_icon">
                                <input id="confirm_password" class="mypassword password_visibility" type="password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <img id="eyepassword_icon" class="iconSmall icon_fn" src="../source/images/icon/svg/eye-invisibility.svg" onclick="passwordVisibility()" alt="password_invisibility">
                        </div>
                        <div class="message">
                            <span id="errormsg" class="error"></span>
                        </div>
                    </div>
                    
                    <?php
                        if (isset($_SESSION['registerPSWerror'])) {
                            echo "<p class='error' style='text-align: center;'>" . $_SESSION['registerPSWerror'] . "</p>";
                        }
                    ?>
                    <div class="input_actions">
                        <input id="registerbtn" class="defaultbtn" type="submit" value="REGISTER" disabled>
                    </div>
                </div>
                <div class="subcontainer_footer">
                    <span> Already have an account? <a class="link" href="login.php?auth=login"> Log In </a></span>
                </div>
            </div>
        </form>
    <?php } ?>
    </div>
<?php
include "include/footer.php"; ?>
