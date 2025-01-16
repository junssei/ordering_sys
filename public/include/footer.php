    <footer>
        <div id="sub_footer">
            <div id="footer_links">
                <div class="links_left">
                    <div class="links">
                        <h2> Contact Information </h2>
                        <ul>
                            <li><img src="..\source\images\icon\svg\Email.svg" alt="icon"><span>bigcas.sarisari@bigcas.store</span></li>
                            <li><img src="..\source\images\icon\svg\Phone.svg" alt="icon"><span>+63 912 154 1566</span></li>
                            <li><img src="..\source\images\icon\svg\Location.svg" alt="icon"> <span>Prk. Sta. Lucia, Mahayahay, Iligan City 9200</span></li>
                        </ul>
                    </div>
                    <div class="links">
                        <h2> Customer Service </h2>
                        <ul>
                            <li><a href=""> Contact us </a></li>
                            <li><a href=""> Pickup Item </a></li>
                            <li><a href=""> Return & Refund </a></li>
                            <li><a href=""> Payment Methods </a></li>
                        </ul>
                    </div>
                    <div class="links">
                        <h2> Company </h2>
                        <ul>
                            <li><a href=""> About us </a></li>
                            <li><a href=""> All products </a></li>
                        </ul>
                    </div>
                    <div class="images_links">
                        <h2> Payment </h2>
                        <ul>
                            <li><a href=""><img src="../source/images/icon/svg/paypal.svg" class="icondefault"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/gcash.svg" class="icondefault"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/cash.svg" class="icondefault"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/googlepay.svg" class="icondefault"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/visa.svg" class="icondefault"></a></li>
                        </ul>
                    </div>
                    <div class="images_links">
                        <h2> Follow us </h2>
                        <ul>
                            <li><a href=""><img src="../source/images/icon/svg/facebook.svg"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/twitter.svg"></a></li>
                            <li><a href=""><img src="../source/images/icon/svg/instagram.svg"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="links_right">
                    <div class="important_links">
                        <ul>
                            <?php if (!$loggedin) { ?>
                                <li><a href="login.php?auth=register">Sign up</a></li>
                            <?php } ?>
                            <li><a href="about.php?b=privacypolicy"> Privacy Policy </a></li>
                            <li><a href="about.php?b=termsncondition"> Terms & Conditions </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="footer_logo">
                <img src="../source/images/logo/WordMark_White2.png" class="imagedefault" alt="logo">
                <p> &copy 2024 | Bigcas. All Right Reserved </p>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <?php include '../source/js/public/manage_js.php'; ?>
    </body>

    </html>