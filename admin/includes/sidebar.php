<div id="sidebar">
    <a id="logo" href="index.php">
        <img src="../source/images/logo/DefaultWordmark.png" class="wordLogoSmall" alt="logo">
    </a>
    <div id="navigation">
        <?php 
        $currentPage = basename($_SERVER['REQUEST_URI'], ".php");
        ?>
        <div id="navmenus">
            <a href="index.php" class="menu <?php if($currentPage === "index") echo "active"; ?>"><img src="../source/images/icon/svg/dashboard.svg" class="iconNormal" alt="dashboard"><p>Dashboard</p></a>
            <div class="menu dropdown"><img src="../source/images/icon/svg/boxes.svg" class="iconNormal" alt="inventory"><p>Inventory</p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="product.php" class="menu <?php if($currentPage === "product") echo "active"; ?>">
                        <span>Product</span>
                    </a>
                    <a href="category.php" class="menu <?php if($currentPage === "category") echo "active"; ?>">
                        <span>Categories</span>
                    </a>
                </div>
            <a href="" class="menu <?php if($currentPage === "") echo "active"; ?>"><img src="../source/images/icon/svg/dashboard.svg" class="iconNormal" alt="dashboard"><p> Orders </p></a>
            <div class="menu dropdown"><img src="../source/images/icon/svg/people.svg" class="iconNormal" alt="users"><p>Users</p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="user_customer.php" class="menu <?php if($currentPage === "user_customer") echo "active"; ?>">
                        <span>Customer</span>
                    </a>
                    <a href="user_admin.php" class="menu <?php if($currentPage === "user_admin") echo "active"; ?>">
                        <span>Admin</span>
                    </a>
                </div>
            <div class="menu dropdown"><img src="../source/images/icon/svg/analytics.svg" class="iconNormal" alt="report"><p> Report </p><img src="../source/images/icon/svg/dropdown.svg"></div>
                <div class="dropdown_menus">
                    <a href="analytics_inventory.php" class="menu <?php if($currentPage === "analytics_inventory") echo "active"; ?>">
                        <span>Inventory</span>
                    </a>
                    <a href="analytics_sales.php" class="menu <?php if($currentPage === "analytics_sales") echo "active"; ?>">
                        <span>Sales</span>
                    </a>
                    <a href="analytics_user.php" class="menu <?php if($currentPage === "analytics_user") echo "active"; ?>">
                        <span>Users</span>
                    </a>
                </div>
        </div>
        <div id="navactions">
            <a id="logout" href="logout.php" class="menu"><img src="../source/images/icon/svg/Log_Out.svg" class="iconNormal" alt="dashboard"><p>Logout</p></a>
        </div>
    </div>
</div>