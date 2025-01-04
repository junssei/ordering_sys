<?php require '../source/db/connect.php'; ?>
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
<div id="container">
    <div id="subcontainer">
        <header>
            <div id="sub_header">
                <div id="header_navigation">
                    <img src="../source/images/logo/DefaultWordmark.png" class="wordLogoSmall" alt="logo">
                    <nav>
                        <a href="index.php"> Home </a>
                        <a href=""> Products </a>
                        <a href=""> Contact </a>
                        <a href=""> Pickup </a>
                    </nav>
                </div>
                <div id="header_userside">
                    <div class="userside_actions">
                        <div class="searchcontainer">
                            <img src="../source/images/icon/svg/search.svg" alt="search_icon">
                            <input type="text" placeholder="Search" class="search_field" onkeyup="searchFilter('variation')">
                        </div>
                        <div class="userside_basket">
                            <span> 333 </span>
                            <img src="../source/images/icon/svg/basket3.svg" class="iconLarge" alt="cart">
                        </div>
                    </div>
                    <div class="userside_actions">
                        <a href="login.php?auth=login" class="button2 btn"> Login </a>
                        <a href="login.php?auth=register" class="button1 btn"> Sign-up </a>
                    </div>
                </div>
            </div>
        </header>